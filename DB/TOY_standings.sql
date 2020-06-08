SELECT a.team_id, c.first as partner1_first, c.last as partner1_last, d.first as partner2_first, d.last as partner2_last, a.GB, a.DY, a.SB, (ifnull(a.GB,0) + ifnull(a.DY,0) + ifnull(a.SB,0) + ifnull(a.MAR,0)) as total_points
FROM gbws_reg.points as a
join team_info as b
	on a.team_id=b.team_id
join member_info as c
	on b.partner1=c.mbr_id
join member_info as d
	on b.partner2=d.mbr_id
having (total_points > 799
    or a.GB is not null and a.DY is not null and a.SB is not null)
order by total_points desc