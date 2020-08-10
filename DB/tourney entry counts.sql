select count(*) as Entries, 
	((count(*)-2)*400) as 'Collected Entry Fees',
    (select count(*) from gbws_reg.transaction_items where item_number='DY-option') as 'Option Pot',
    (select (count(*)*200) from gbws_reg.transaction_items where item_number='DY-option') as 'Option Pot Fees',
	(select count(*) from gbws_reg.transaction_items where item_number='DY-fish') as 'Big Fish',
    (select (count(*)*20) from gbws_reg.transaction_items where item_number='DY-fish') as 'Big Fish Fees'
FROM gbws_reg.transaction_items
where item_number='DY-Tourney'
    