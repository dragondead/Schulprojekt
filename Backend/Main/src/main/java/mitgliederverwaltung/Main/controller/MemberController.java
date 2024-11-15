package mitgliederverwaltung.Main.controller;

import io.swagger.v3.oas.annotations.Operation;
import mitgliederverwaltung.Main.model.Member;
import mitgliederverwaltung.Main.repository.MemberRepository;
import mitgliederverwaltung.Main.service.MemberService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.web.bind.annotation.*;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.List;
import java.util.Optional;

@org.springframework.web.bind.annotation.RestController
@RequestMapping("/v1/member")
public class MemberController {

    @Autowired
    private MemberService service;

    @Autowired
    private MemberRepository memberRepository;


    @GetMapping
    public List<Member> findAll() {
        return memberRepository.findAll();
    }

    @GetMapping(value = "/{id}")
    public Optional<Member> findById(@PathVariable("id") Long id) {
        return memberRepository.findById(id);
    }

    @Operation(summary = "create a Member", description = "creates the provided Member and returns it's ID")
    @PostMapping
    public Long create(@RequestBody Member resource) {
        if(resource == null) {
            return (long) -1;
        }
        service.saveMember(resource);
        SimpleDateFormat formatter = new SimpleDateFormat("yyyy-MM-dd");
        try {
            Member temp = memberRepository.findByNameAndSurnameAndJoinedAt(resource.getName(), resource.getSurname(), formatter.parse(resource.getJoinedAt()));
            return temp.getId();
        } catch(ParseException e) {
            System.out.println(e.getMessage());
        }

        return (long) -1;
    }

    @PutMapping(value = "/{id}")
    public HttpStatus update(@PathVariable("id") Long id, @RequestBody Member member) {
        if(member == null) {
            return HttpStatus.BAD_REQUEST;
        }
        member.setId(id);
        service.saveMember(member);

        return HttpStatus.OK;
    }

    @DeleteMapping(value = "/{id}")
    @ResponseStatus(HttpStatus.OK)
    public void delete(@PathVariable("id") Long id) {
        memberRepository.deleteById(id);
    }
}
