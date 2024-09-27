package mitgliederverwaltung.Main.controller;

import io.swagger.v3.oas.annotations.Operation;
import mitgliederverwaltung.Main.model.Member;
import mitgliederverwaltung.Main.model.Sport;
import mitgliederverwaltung.Main.repository.MemberRepository;
import mitgliederverwaltung.Main.repository.SportRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.web.bind.annotation.*;

import java.util.List;
import java.util.Optional;

@RestController
@RequestMapping("/v1/sport")
public class SportController {

    @Autowired
    private SportRepository sportRepository;

    @Autowired
    private MemberRepository memberRepository;

    @Operation(summary = "Get all sports", description = "Gets all sports that are  in Table 'Sports'")
    @GetMapping
    public List<Sport> findAll() {
        return sportRepository.findAll();
    }

    @Operation(summary = "Get sport by ID", description = "Retrieves a sport by its ID")
    @GetMapping(value = "/{id}")
    public Optional<Sport> findById(@PathVariable("id") Long id) {
        return sportRepository.findById(id);
    }

    @Operation(summary = "Creates a new sport", description = "Provide {\n" +
            "    \"name\": \"basketball\",\n" +
            "    \"weekDayOne\":\"mon\",\n" +
            "    \"weekDayTwo\":\"tue\"\n" +
            "}")
    @PostMapping
    public HttpStatus create(@RequestBody Sport resource) {
        if (resource == null ) {
            return HttpStatus.BAD_REQUEST;
        }

        sportRepository.save(resource);

        return HttpStatus.CREATED;
    }

    @Operation(summary = "Add a Member to sport id", description = "Adds a given member (queryparameter) to the sport.")
    @PostMapping(value = "/{id}/member")
    public HttpStatus addMembers(@PathVariable("id") Long id, @RequestParam Long memberId) {

        Optional<Sport> sport = sportRepository.findById(id);
        Optional<Member> member = memberRepository.findById(memberId);

        sport.get().addMember(member.get());

        sportRepository.save(sport.get());

        return HttpStatus.CREATED;
    }

    @Operation(summary = "Remove a Member from sport id", description = "Removes a given member (queryparameter) from the sport.")
    @DeleteMapping(value = "/{id}/member")
    public HttpStatus removeMembers(@PathVariable("id") Long id, @RequestParam Long memberId) {

        Optional<Sport> sport = sportRepository.findById(id);
        Optional<Member> member = memberRepository.findById(memberId);

        sport.get().removeMember(member.get());

        sportRepository.save(sport.get());

        return HttpStatus.CREATED;
    }

    @Operation(summary = "Update a sport", description = "Updates the sport with the given id")
    @PutMapping(value = "/{id}")
    public HttpStatus update(@PathVariable( "id" ) Long id, @RequestBody Sport sport) {
        if (sport == null ) {
            return HttpStatus.BAD_REQUEST;
        }
        sport.setId(id);
        sportRepository.save(sport);

        return HttpStatus.OK;
    }

    @Operation(summary = "Delete a sport", description = "Deletes the sport with the given id")
    @DeleteMapping(value = "/{id}")
    @ResponseStatus(HttpStatus.OK)
    public void delete(@PathVariable("id") Long id) {
        sportRepository.deleteById(id);
    }
}
