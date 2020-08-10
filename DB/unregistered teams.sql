DROP TABLE IF EXISTS gbws_reg.GBTourney;
DROP TABLE IF EXISTS gbws_reg.DYTourney;
DROP TABLE IF EXISTS gbws_reg.dy_unregistered_teams ;
DROP TABLE IF EXISTS gbws_reg.dy_unregistered_partners;

CREATE TABLE gbws_reg.GBTourney
AS
SELECT a.custom 
	FROM gbws_reg.transactions a
	JOIN gbws_reg.transaction_items b
    ON a.txn_id=b.txn_id
where b.item_number='GB-Tourney';

CREATE TABLE gbws_reg.DYTourney
AS
SELECT a.custom 
	FROM gbws_reg.transactions a
	JOIN gbws_reg.transaction_items b
    ON a.txn_id=b.txn_id
where b.item_number='DY-Tourney';

CREATE TABLE gbws_reg.dy_unregistered_teams 
AS
SELECT a.custom as GBTourney
	FROM gbws_reg.GBTourney a
    left JOIN gbws_reg.DYTourney b
    ON a.custom=b.custom
where b.custom is null;

CREATE TABLE gbws_reg.dy_unregistered_partners
SELECT team_id,
		partner1,
		partner2
	FROM gbws_reg.dy_unregistered_teams a
	JOIN gbws_reg.team_info b
    ON a.GBTourney=b.team_id;
    
select *
	FROM gbws_reg.dy_unregistered_partners a
    JOIN gbws_reg.member_info b
    on (a.partner1=b.mbr_id or a.partner2=b.mbr_id)
