package mitgliederverwaltung.Main.model.dto;

import com.fasterxml.jackson.annotation.JsonView;
import jakarta.persistence.Column;
import mitgliederverwaltung.Main.util.Views;

import java.util.Date;

public class MemberDTO {

    @JsonView(Views.FullNameMember.class)
    private Long id;
    private int fee;
    @JsonView(Views.FullNameMember.class)
    private String name;
    @JsonView(Views.FullNameMember.class)
    private String surname;
    private String email;
    private Date joinedAt;
    private Date exitAt;

    public MemberDTO() {
    }

    public MemberDTO(Long id, int fee, String name, String surname, String email, Date joinedAt, Date exitAt) {
        this.id = id;
        this.fee = fee;
        this.name = name;
        this.surname = surname;
        this.email = email;
        this.joinedAt = joinedAt;
        this.exitAt = exitAt;
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public int getFee() {
        return fee;
    }

    public void setFee(int fee) {
        this.fee = fee;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getSurname() {
        return surname;
    }

    public void setSurname(String surname) {
        this.surname = surname;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public Date getJoinedAt() {
        return joinedAt;
    }

    public void setJoinedAt(Date joinedAt) {
        this.joinedAt = joinedAt;
    }

    public Date getExitAt() {
        return exitAt;
    }

    public void setExitAt(Date exitAt) {
        this.exitAt = exitAt;
    }
}
