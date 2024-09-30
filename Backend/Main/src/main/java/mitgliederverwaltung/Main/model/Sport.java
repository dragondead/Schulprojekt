package mitgliederverwaltung.Main.model;

import com.fasterxml.jackson.annotation.JsonIgnore;
import jakarta.persistence.*;

import java.util.ArrayList;
import java.util.HashSet;
import java.util.List;
import java.util.Set;

@Entity
@Table(name = "sports")
public class Sport {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    private String name;

    private String weekDayOne;

    private String weekDayTwo;

    @ManyToOne(fetch = FetchType.EAGER)
    @JoinColumn(name = "department_head_id")
    private Member departmentHead;

    @ManyToMany(mappedBy = "sports", fetch = FetchType.LAZY, cascade = CascadeType.PERSIST)
    @JsonIgnore
    private List<Member> members = new ArrayList<>();

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getWeekDayOne() {
        return weekDayOne;
    }

    public void setWeekDayOne(String weekDayOne) {
        this.weekDayOne = weekDayOne;
    }

    public String getWeekDayTwo() {
        return weekDayTwo;
    }

    public void setWeekDayTwo(String weekDayTwo) {
        this.weekDayTwo = weekDayTwo;
    }

    public Member getDepartmentHead() {
        return departmentHead;
    }

    public void setDepartmentHead(Member departmentHead) {
        this.departmentHead = departmentHead;
    }

    public List<Member> getMembers() {
        return members;
    }

    public void setMembers(List<Member> members) {
        this.members = members;
    }

    public void addMember(Member member) {
        members.add(member);
        member.getSports().add(this);
    }

    public void removeMember(Member member) {
        members.remove(member);
        member.getSports().remove(this);
    }


}
