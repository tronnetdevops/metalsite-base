-- Use these to reload the activities
--
-- DROP TRIGGER `after_insert_favorite`;

delimiter |

-- CREATE TRIGGER `after_update_account`
--     AFTER UPDATE ON `satanbarbara`.`accounts` FOR EACH ROW
--     BEGIN
-- 		IF NEW.redeemed <> OLD.redeemed THEN
-- 			INSERT IGNORE INTO `satanbarbara`.`activities`
-- 				(`account_id`, `type`, `action`, `data`)
-- 				VALUES (NEW.id, 'account', 'redemption', CONCAT('{"account_id": ', NEW.id, ', "redeemed": ', NEW.redeemed, ', "points": ', NEW.points, ', "amount": ', (NEW.points - NEW.redeemed),  '}'));
-- 		END IF;
--     END;
-- |

delimiter ;