

        
SELECT a.team_id,
	concat(c.first, ' ', c.last) as Partner1,
	concat(d.first, ' ', d.last) as Partner2,
	a.GB,
    a.DY,
    a.SB,
    a.MAR,
    (ifnull(a.GB,0) + ifnull(a.DY,0) + ifnull(a.SB,0) + ifnull(a.MAR,0)) as total_points
FROM gbws_reg.points as a
	join gbws_reg.team_info as b on a.team_id=b.team_id
    inner join gbws_reg.member_info c on ( b.partner1=c.mbr_id)
    inner join gbws_reg.member_info d on (b.partner2=d.mbr_id)
    left join gbws_reg.temp_subs e on a.team_id=e.team_id
where e.team_id IS NULL
order by total_points desc;

SELECT a.team_id,
	concat(c.first, ' ', c.last) as Partner1,
	concat(d.first, ' ', d.last) as Partner2,
	a.GB,
    a.DY,
    a.SB,
    a.MAR,
    (ifnull(a.GB,0) + ifnull(a.DY,0) + ifnull(a.SB,0) + ifnull(a.MAR,0)) as total_points
FROM gbws_reg.points as a
	join gbws_reg.team_info as b on a.team_id=b.team_id
    inner join gbws_reg.member_info c on ( b.partner1=c.mbr_id)
    inner join gbws_reg.member_info d on (b.partner2=d.mbr_id)
    right join gbws_reg.temp_subs e on a.team_id=e.team_id
order by total_points desc;




