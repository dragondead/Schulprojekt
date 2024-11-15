package mitgliederverwaltung.Main.service;

import mitgliederverwaltung.Main.model.Address;
import mitgliederverwaltung.Main.model.Member;
import mitgliederverwaltung.Main.repository.AddressRepository;
import mitgliederverwaltung.Main.repository.MemberRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class MemberService {
    @Autowired
    private MemberRepository memberRepository;

    @Autowired
    private AddressRepository addressRepository;

    public Member saveMember(Member member) {
        // Check if the address exists or needs to be saved
        if (member.getAddress() != null) {
            Address address = addressRepository.findAddressByZipAndCityAndStreetAndHouseNumber(member.getAddress().getZip(),member.getAddress().getCity(),member.getAddress().getStreet(),member.getAddress().getHouseNumber());//findById(member.getAddress().getId();
            if (address != null) {
                member.setAddress(address);
            }
        }
        return memberRepository.save(member);  // Save both member and address
    }
}
