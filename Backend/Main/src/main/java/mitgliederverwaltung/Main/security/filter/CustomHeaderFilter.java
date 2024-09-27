package mitgliederverwaltung.Main.security.filter;

import jakarta.servlet.FilterChain;
import jakarta.servlet.ServletException;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import org.springframework.http.HttpStatus;
import org.springframework.security.authentication.AnonymousAuthenticationToken;
import org.springframework.security.core.Authentication;
import org.springframework.security.core.GrantedAuthority;
import org.springframework.security.core.authority.SimpleGrantedAuthority;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.web.filter.OncePerRequestFilter;

import java.io.IOException;
import java.util.ArrayList;
import java.util.List;
import java.util.Objects;

public class CustomHeaderFilter extends OncePerRequestFilter {

    private String key = "bihekbnrlkar4324bbdejfjm2";

    @Override
    protected void doFilterInternal(HttpServletRequest request, HttpServletResponse response, FilterChain filterChain) throws ServletException, IOException {
        var header = request.getHeaderNames();
        if(Objects.equals(request.getHeader("x-secret"), key)){
            var newSecurityContext = SecurityContextHolder.createEmptyContext();
            var authToken = new AnonymousAuthenticationToken("api","api", List.of(new SimpleGrantedAuthority("ROLE_API")));
            newSecurityContext.setAuthentication(authToken);
            SecurityContextHolder.setContext(newSecurityContext);
        }


        filterChain.doFilter(request, response);
    }
}