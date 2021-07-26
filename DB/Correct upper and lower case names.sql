set sql_safe_updates = 0;


UPDATE member_info
SET first = CONCAT(UCASE(LEFT(first, 1)), 
                      LCASE(SUBSTRING(first, 2)));
                      
                      
                      
UPDATE member_info
SET last = CONCAT(UCASE(LEFT(last, 1)), 
                      LCASE(SUBSTRING(last, 2)));