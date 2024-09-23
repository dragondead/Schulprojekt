package mitgliederverwaltung.Main.repository;

import mitgliederverwaltung.Main.model.Member;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface PersonRepository extends JpaRepository<Member, Long> {
    Member findByName(String name);
}
