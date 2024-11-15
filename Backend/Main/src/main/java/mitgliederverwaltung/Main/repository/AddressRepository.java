package mitgliederverwaltung.Main.repository;

import mitgliederverwaltung.Main.model.Address;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface AddressRepository extends JpaRepository<Address, Long> {

    Address findAddressByZipAndCityAndStreetAndHouseNumber(String zip, String city, String street, int houseNumber);
}
