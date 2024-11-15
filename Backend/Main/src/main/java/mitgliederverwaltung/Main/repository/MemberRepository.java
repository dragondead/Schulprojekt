package mitgliederverwaltung.Main.repository;

import mitgliederverwaltung.Main.model.Member;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Modifying;
import org.springframework.data.jpa.repository.Query;
import org.springframework.stereotype.Repository;

import java.util.Date;

@Repository
public interface MemberRepository extends JpaRepository<Member, Long> {
    Member findByName(String name);
    Member findByNameAndSurnameAndJoinedAt(String name, String surname, Date joinedAt);
}
