package mitgliederverwaltung.Main.controller;

import mitgliederverwaltung.Main.model.Member;
import mitgliederverwaltung.Main.repository.MemberRepository;
import mitgliederverwaltung.Main.service.MemberService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.web.bind.annotation.*;

import java.util.List;
import java.util.Optional;

@org.springframework.web.bind.annotation.RestController
@RequestMapping("/member")
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

    @PostMapping
    public HttpStatus create(@RequestBody Member resource) {
        if (resource == null ) {
            return HttpStatus.BAD_REQUEST;
        }
        service.saveMember(resource);

        return HttpStatus.CREATED;
    }

    @PutMapping(value = "/{id}")
    @ResponseStatus(HttpStatus.OK)
    public HttpStatus update(@PathVariable( "id" ) Long id, @RequestBody Member member) {
        if (member == null ) {
            return HttpStatus.BAD_REQUEST;
        }
        member.setId(id);
        service.saveMember(member);

        return  HttpStatus.OK;
    }

    @DeleteMapping(value = "/{id}")
    @ResponseStatus(HttpStatus.OK)
    public void delete(@PathVariable("id") Long id) {
        memberRepository.deleteById(id);
    }
}
