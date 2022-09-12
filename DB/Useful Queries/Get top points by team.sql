SELECT points.team_id, points.tourney, points.points,              -- self join and GROUP BY
       COUNT(*) AS rn
FROM points
  JOIN points AS t2
    ON  t2.team_id = points.team_id
    AND ( t2.points > points.points
        OR  t2.points = points.points
        AND t2.team_id <= points.team_id
        )
GROUP BY points.team_id, points.tourney, points.points
HAVING COUNT(*) <= 2
ORDER BY team_id, rn ;

      