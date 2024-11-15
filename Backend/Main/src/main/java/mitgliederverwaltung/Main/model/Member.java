package mitgliederverwaltung.Main.model;

import com.fasterxml.jackson.annotation.JsonIgnore;
import jakarta.persistence.*;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.HashSet;
import java.util.Set;

@Entity
@Table(name = "members")
public class Member {

    @Transient
    private SimpleDateFormat formatter = new SimpleDateFormat("yyyy-MM-dd");

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    @Column(nullable = false)
    private int fee;

    @Column(nullable = false)
    private String name;

    @Column(nullable = false)
    private String surname;

    @Column(nullable = false)
    private String email;

    @Column(nullable = false)
    private Date joinedAt;

    private Date exitAt;

    @ManyToOne(cascade = CascadeType.MERGE)
    @JoinColumn(name = "adress_id")
    private Address address;

    @ManyToMany(fetch = FetchType.LAZY, cascade = CascadeType.PERSIST)
    @JoinTable(name = "member_sports", joinColumns = @JoinColumn(name = "member_id"), inverseJoinColumns = @JoinColumn(name = "sport_id"))
    @JsonIgnore
    private Set<Sport> sports = new HashSet<>();


    public Member() {
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

    public String getJoinedAt() {
        // Format the Date object into the desired string
        String formattedDate = formatter.format(joinedAt);
        //return joinedAt;
        return formattedDate;

    }

    public void setJoinedAt(String joinedAt) throws ParseException {
        this.joinedAt = formatter.parse(joinedAt);
    }

    public Date getExitAt() {
        return exitAt;
    }

    public void setExitAt(Date exitAt) {
        this.exitAt = exitAt;
    }

    public Address getAddress() {
        return address;
    }

    public void setAddress(Address address) {
        this.address = address;
    }

    public Set<Sport> getSports() {
        return sports;
    }

    public void setSports(Set<Sport> sports) {
        this.sports = sports;
    }

    public void addSport(Sport sport){
        sports.add(sport);
        sport.getMembers().add(this);
    }

    public void removeSport(Sport sport){
        sports.remove(sport);
        sport.getMembers().remove(this);
    }

}
