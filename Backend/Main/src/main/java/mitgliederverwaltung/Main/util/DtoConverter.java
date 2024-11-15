package mitgliederverwaltung.Main.util;

import mitgliederverwaltung.Main.model.Member;
import mitgliederverwaltung.Main.model.Sport;
import mitgliederverwaltung.Main.model.dto.MemberDTO;
import mitgliederverwaltung.Main.model.dto.SportDTO;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.List;
import java.util.stream.Collectors;

public class DtoConverter {

    public static MemberDTO convertMember(Member member) {
        SimpleDateFormat formatter = new SimpleDateFormat("yyyy-MM-dd");
        try {
            MemberDTO memberDTO = new MemberDTO(member.getId(), member.getFee(), member.getName(), member.getSurname(), member.getEmail(), formatter.parse(member.getJoinedAt()),member.getExitAt());
            return memberDTO;
        } catch (ParseException e) {
            return new MemberDTO();
        }

    }

    public static SportDTO convertSport(Sport sport) {
        SportDTO sportDTO = new SportDTO();
        sportDTO.setId(sport.getId());
        sportDTO.setName(sport.getName());
        sportDTO.setWeekDayOne(sport.getWeekDayOne());
        sportDTO.setWeekDayTwo(sport.getWeekDayTwo());

        List<Long> studentIds = sport.getMembers()
                .stream()
                .map(Member::getId)
                .collect(Collectors.toList());
        sportDTO.setMembers(studentIds);
        return sportDTO;
    }
}
