package mitgliederverwaltung.Main.model.dto;

import jakarta.persistence.*;
import mitgliederverwaltung.Main.model.Member;

import java.util.ArrayList;
import java.util.HashSet;
import java.util.List;
import java.util.Set;

public class SportDTO {
    private Long id;
    private String name;
    private String weekDayOne;
    private String weekDayTwo;
    private Long departmentHead;
    private List<Long> members = new ArrayList<>();

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

    public Long getDepartmentHead() {
        return departmentHead;
    }

    public void setDepartmentHead(Long departmentHead) {
        this.departmentHead = departmentHead;
    }

    public List<Long> getMembers() {
        return members;
    }

    public void setMembers(List<Long> members) {
        this.members = members;
    }
}
