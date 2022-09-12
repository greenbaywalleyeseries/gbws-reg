SELECT team_id,
    	   (SELECT CONCAT(first," ",last) FROM member_info WHERE team_info.partner1=member_info.mbr_id) AS 'Partner1',
           (SELECT CONCAT(first," ",last) FROM member_info WHERE team_info.partner2=member_info.mbr_id) AS 'Partner2',
           (SELECT CONCAT(first," ",last) FROM member_info WHERE team_info.sub1=member_info.mbr_id) AS 'Sub1',
           (SELECT points from points where team_info.team_id=points.team_id AND tourney='T1') as T1, 
           (SELECT points from points where team_info.team_id=points.team_id AND tourney='T2') as T2, 
           (SELECT points from points where team_info.team_id=points.team_id AND tourney='T3') as T3, 
           (SELECT points from points where team_info.team_id=points.team_id AND tourney='T4') as T4, 
           (SELECT points from points where team_info.team_id=points.team_id AND tourney='CH') as CH
        FROM
	       team_info
        ORDER BY
            CAST(SUBSTRING_INDEX(team_id,"_",-1) AS SIGNED)