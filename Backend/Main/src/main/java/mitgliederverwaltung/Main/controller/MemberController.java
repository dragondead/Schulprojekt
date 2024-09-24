package mitgliederverwaltung.Main.controller;

import mitgliederverwaltung.Main.model.Member;
import mitgliederverwaltung.Main.repository.MemberRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.web.bind.annotation.*;

import java.util.List;
import java.util.Optional;

@org.springframework.web.bind.annotation.RestController
@RequestMapping("/member")
public class MemberController {

    @Autowired
    private MemberRepository service;


    @GetMapping
    public List<Member> findAll() {
        return service.findAll();
    }

    @GetMapping(value = "/{id}")
    public Optional<Member> findById(@PathVariable("id") Long id) {
        return service.findById(id);
    }

    @PostMapping
    @ResponseStatus(HttpStatus.CREATED)
    public HttpStatus create(@RequestBody Member resource) {
        if (resource == null ) {
            return HttpStatus.BAD_REQUEST;
        }
        service.save(resource);

        return HttpStatus.CREATED;
    }

    @PutMapping(value = "/{id}")
    @ResponseStatus(HttpStatus.OK)
    public HttpStatus update(@PathVariable( "id" ) Long id, @RequestBody Member resource) {
        if (resource == null ) {
            return HttpStatus.BAD_REQUEST;
        }
        return  HttpStatus.OK;
    }

    @DeleteMapping(value = "/{id}")
    @ResponseStatus(HttpStatus.OK)
    public void delete(@PathVariable("id") Long id) {
        service.deleteById(id);
    }
}
