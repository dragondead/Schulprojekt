package mitgliederverwaltung.Main.model;

import jakarta.persistence.*;

import java.util.HashSet;
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

    private String description;

    @ManyToOne(fetch = FetchType.LAZY)
    @JoinColumn(name = "department_head_id")  // Foreign key to Member table
    private Member departmentHead;

    @ManyToMany(mappedBy = "sports", fetch = FetchType.LAZY)
    private Set<Member> members = new HashSet<Member>();

}
