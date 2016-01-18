INSERT INTO `tags` (`slug`, `title`, `description`, `activated`) VALUES ('guitar', 'Guitar', '', 1);
INSERT INTO `tags` (`slug`, `title`, `description`, `activated`) VALUES ('bass', 'Bass', '', 1);
INSERT INTO `tags` (`slug`, `title`, `description`, `activated`) VALUES ('drums', 'Drums', '', 1);
INSERT INTO `tags` (`slug`, `title`, `description`, `activated`) VALUES ('vocals', 'Vocals', '', 1);
INSERT INTO `tags` (`slug`, `title`, `description`, `activated`) VALUES ('keyboards', 'Keyboards', '', 1);

INSERT INTO `tags` (`slug`, `title`, `description`, `activated`) VALUES ('death-metal', 'Death Metal', '', 1);
INSERT INTO `tags` (`slug`, `title`, `description`, `activated`) VALUES ('black-metal', 'Black Metal', '', 1);
INSERT INTO `tags` (`slug`, `title`, `description`, `activated`) VALUES ('melodic-death-metal', 'Melodic Death Metal', '', 1);
INSERT INTO `tags` (`slug`, `title`, `description`, `activated`) VALUES ('thrash-metal', 'Thrash Metal', '', 1);
INSERT INTO `tags` (`slug`, `title`, `description`, `activated`) VALUES ('blackened-death-metal', 'Blackened Death Metal', '', 1);

INSERT INTO `venues` (`title`, `description`, `activated`) VALUES ('Euphoria Hookah Lounge', '', 1);
INSERT INTO `venues` (`title`, `description`, `activated`) VALUES ('Whiskey Richards', '', 1);
INSERT INTO `venues` (`title`, `description`, `activated`) VALUES ('Creekside Bar & Grill', '', 1);
INSERT INTO `venues` (`title`, `description`, `activated`) VALUES ('The Tavern', '', 1);

INSERT INTO `acts` (`title`, `description`, `state`, `status`, `started`, `activated`) VALUES ('Dark Vital Flames', '', 1, 'Recording', '2008-11-01 27:00:00', 1);
INSERT INTO `acts` (`title`, `description`,  `started`, `activated`) VALUES ('Eating Fear', '', '2010-06-01 27:00:00', 1);
INSERT INTO `acts` (`title`, `description`,  `started`, `activated`) VALUES ('Thrash Commander', '', '2009-07-01 27:00:00', 1);
INSERT INTO `acts` (`title`, `description`,  `started`, `activated`) VALUES ('Chao Lux', '', '2012-05-01 27:00:00', 1);


INSERT INTO `genres` (`act_id`, `tag_id`, `activated`) VALUES (1, 9, 1);
INSERT INTO `genres` (`act_id`, `tag_id`, `activated`) VALUES (2, 11, 1);
INSERT INTO `genres` (`act_id`, `tag_id`, `activated`) VALUES (2, 9, 1);
INSERT INTO `genres` (`act_id`, `tag_id`, `activated`) VALUES (3, 10, 1);

-- Role will determine your account type, eg, client, manager, admin
-- Privilege legel will determine your permissions within that role (typically 3 is all)
-- Type will determine a type of role you are, so a client can be a band member, or venue owner

INSERT INTO `accounts` (`username`, `fname`, `lname`, `nickname`, `email`, `password`, `role`, `privilege_level`, `type`, `bio`, `activated`) VALUES ('tronhammer', 'Sean', 'Murray', 'Tronhammer', 'smurray@tronnet.me', 'Test1234', 3, 3, 1, '', 1);
INSERT INTO `accounts` (`username`, `fname`, `lname`, `nickname`, `email`, `password`, `role`, `privilege_level`, `type`, `bio`, `activated`) VALUES ('coltontrautz', 'Colton', 'Truatz', 'Kvltonovich T-Razzle', 'coltontrautz@satanbarbara.com', 'ilovesatan', 1, 2, 2, '', 1);
INSERT INTO `accounts` (`username`, `fname`, `lname`, `nickname`, `email`, `password`, `role`, `privilege_level`, `type`, `bio`, `activated`) VALUES ('anthonydelarenzi', 'Anthony', 'DeLorenzi', 'Antonious Balonious', 'anthonydelarenzi@satanbarbara.com', 'ilovesatan', 1, 2, 2, '', 1);
INSERT INTO `accounts` (`username`, `fname`, `lname`, `nickname`, `email`, `password`, `role`, `privilege_level`, `type`, `bio`, `activated`) VALUES ('peterboone', 'Peter', 'Boone', 'Petarski', 'peterboone@satanbarbara.com', 'ilovesatan', 1, 2, 2, '', 1);
INSERT INTO `accounts` (`username`, `fname`, `lname`, `nickname`, `email`, `password`, `role`, `privilege_level`, `type`, `bio`, `activated`) VALUES ('philipporras', 'Philip', 'Porras', 'Philphy Phill', 'philipporras@satanbarbara.com', 'ilovesatan', 1, 2, 2, '', 1);
INSERT INTO `accounts` (`username`, `fname`, `lname`, `nickname`, `email`, `password`, `role`, `privilege_level`, `type`, `bio`, `activated`) VALUES ('joneisenhart', 'Jon', 'Eisenhart', '', 'joneisenhart@satanbarbara.com', 'ilovesatan', 1, 2, 2, '', 1);
INSERT INTO `accounts` (`username`, `fname`, `lname`, `nickname`, `email`, `password`, `role`, `privilege_level`, `type`, `bio`, `activated`) VALUES ('fabianguerrero', 'Fabian', 'Guerrero', '', 'fabianguerrero@satanbarbara.com', 'ilovesatan', 1, 2, 2, '', 1);
INSERT INTO `accounts` (`username`, `fname`, `lname`, `nickname`, `email`, `password`, `role`, `privilege_level`, `type`, `bio`, `activated`) VALUES ('ericlamb', 'Eric', 'Lamb', 'Errock Magoo', 'ericlamb@satanbarbara.com', 'ilovesatan', 1, 2, 2, '', 1);
INSERT INTO `accounts` (`username`, `fname`, `lname`, `nickname`, `email`, `password`, `role`, `privilege_level`, `type`, `bio`, `activated`) VALUES ('joshnordholm', 'Josh', 'Nordholm', 'Flanco', 'joshnordholm@satanbarbara.com', 'ilovesatan', 1, 2, 2, '', 1);


INSERT INTO `memberships` (`account_id`, `act_id`, `activated`) VALUES (1, 1, 1);
INSERT INTO `memberships` (`account_id`, `act_id`, `activated`) VALUES (2, 1, 1);
INSERT INTO `memberships` (`account_id`, `act_id`, `activated`) VALUES (3, 1, 1);
INSERT INTO `memberships` (`account_id`, `act_id`, `activated`) VALUES (4, 1, 1);
INSERT INTO `memberships` (`account_id`, `act_id`, `activated`) VALUES (7, 1, 1);

INSERT INTO `memberships` (`account_id`, `act_id`, `activated`) VALUES (5, 2, 1);
INSERT INTO `memberships` (`account_id`, `act_id`, `activated`) VALUES (6, 2, 1);
INSERT INTO `memberships` (`account_id`, `act_id`, `activated`) VALUES (7, 2, 1);

INSERT INTO `memberships` (`account_id`, `act_id`, `activated`) VALUES (8, 3, 1);

INSERT INTO `memberships` (`account_id`, `act_id`, `activated`) VALUES (1, 4, 1);
INSERT INTO `memberships` (`account_id`, `act_id`, `activated`) VALUES (2, 4, 1);
INSERT INTO `memberships` (`account_id`, `act_id`, `activated`) VALUES (9, 4, 1);
INSERT INTO `memberships` (`account_id`, `act_id`, `activated`) VALUES (4, 4, 1);

INSERT INTO `roles` (`membership_id`, `tag_id`, `activated`) VALUES (1, 1, 1);
INSERT INTO `roles` (`membership_id`, `tag_id`, `activated`) VALUES (2, 2, 1);
INSERT INTO `roles` (`membership_id`, `tag_id`, `activated`) VALUES (2, 4, 1);
INSERT INTO `roles` (`membership_id`, `tag_id`, `activated`) VALUES (3, 1, 1);
INSERT INTO `roles` (`membership_id`, `tag_id`, `activated`) VALUES (4, 3, 1);
INSERT INTO `roles` (`membership_id`, `tag_id`, `activated`) VALUES (5, 3, 1);
INSERT INTO `roles` (`membership_id`, `tag_id`, `activated`) VALUES (6, 1, 1);
INSERT INTO `roles` (`membership_id`, `tag_id`, `activated`) VALUES (6, 4, 1);
INSERT INTO `roles` (`membership_id`, `tag_id`, `activated`) VALUES (7, 2, 1);
INSERT INTO `roles` (`membership_id`, `tag_id`, `activated`) VALUES (8, 3, 1);
INSERT INTO `roles` (`membership_id`, `tag_id`, `activated`) VALUES (9, 1, 1);
INSERT INTO `roles` (`membership_id`, `tag_id`, `activated`) VALUES (9, 4, 1);
INSERT INTO `roles` (`membership_id`, `tag_id`, `activated`) VALUES (9, 5, 1);
INSERT INTO `roles` (`membership_id`, `tag_id`, `activated`) VALUES (10, 1, 1);
INSERT INTO `roles` (`membership_id`, `tag_id`, `activated`) VALUES (11, 2, 1);
INSERT INTO `roles` (`membership_id`, `tag_id`, `activated`) VALUES (12, 1, 1);
INSERT INTO `roles` (`membership_id`, `tag_id`, `activated`) VALUES (13, 3, 1);

INSERT INTO `talents` (`account_id`, `tag_id`, `activated`) VALUES (1, 1, 1);
INSERT INTO `talents` (`account_id`, `tag_id`, `activated`) VALUES (1, 3, 1);
INSERT INTO `talents` (`account_id`, `tag_id`, `activated`) VALUES (2, 2, 1);
INSERT INTO `talents` (`account_id`, `tag_id`, `activated`) VALUES (2, 1, 1);
INSERT INTO `talents` (`account_id`, `tag_id`, `activated`) VALUES (2, 4, 1);
INSERT INTO `talents` (`account_id`, `tag_id`, `activated`) VALUES (3, 1, 1);
INSERT INTO `talents` (`account_id`, `tag_id`, `activated`) VALUES (3, 5, 1);
INSERT INTO `talents` (`account_id`, `tag_id`, `activated`) VALUES (4, 4, 1);
INSERT INTO `talents` (`account_id`, `tag_id`, `activated`) VALUES (5, 1, 1);
INSERT INTO `talents` (`account_id`, `tag_id`, `activated`) VALUES (6, 2, 1);
INSERT INTO `talents` (`account_id`, `tag_id`, `activated`) VALUES (7, 3, 1);
INSERT INTO `talents` (`account_id`, `tag_id`, `activated`) VALUES (8, 1, 1);
INSERT INTO `talents` (`account_id`, `tag_id`, `activated`) VALUES (8, 4, 1);
INSERT INTO `talents` (`account_id`, `tag_id`, `activated`) VALUES (8, 5, 1);
INSERT INTO `talents` (`account_id`, `tag_id`, `activated`) VALUES (9, 1, 1);
INSERT INTO `talents` (`account_id`, `tag_id`, `activated`) VALUES (9, 4, 1);
INSERT INTO `talents` (`account_id`, `tag_id`, `activated`) VALUES (9, 3, 1);

INSERT INTO `events` (`title`, `start`, `end`, `instructions`, `description`, `activated`) VALUES ('Metal Night', '2015-10-21 20:00:00', '2015-10-21 23:00:00', '', '', 1);
INSERT INTO `events` (`title`, `start`, `end`, `instructions`, `description`, `activated`) VALUES ('Open Mic Night', '2015-10-22 20:00:00', '2015-10-22 23:00:00', '', '', 1);
INSERT INTO `events` (`title`, `start`, `end`, `instructions`, `description`, `activated`) VALUES ('Metal Night', '2015-10-28 20:00:00', '2015-10-28 23:00:00', '', '', 1);
INSERT INTO `events` (`title`, `start`, `end`, `instructions`, `description`, `activated`) VALUES ('Smash Jams Night', '2015-11-04 18:00:00', '2015-11-04 23:00:00', '', '', 1);
INSERT INTO `events` (`title`, `start`, `end`, `instructions`, `description`, `activated`) VALUES ('Zombie Prom', '2015-11-07 16:00:00', '2015-11-08 02:00:00', '', '', 1);

INSERT INTO `performances` (`event_id`, `act_id`, `position`, `slot`, `activated`) VALUES (1, 3, 1, '2015-10-21 20:30:00', 1);
INSERT INTO `performances` (`event_id`, `act_id`, `position`, `slot`, `activated`) VALUES (2, 3, 1, '2015-10-22 20:30:00', 1);
INSERT INTO `performances` (`event_id`, `act_id`, `position`, `slot`, `activated`) VALUES (2, 1, 2, '2015-10-22 21:00:00', 1);
INSERT INTO `performances` (`event_id`, `act_id`, `position`, `slot`, `activated`) VALUES (3, 3, 1, '2015-10-28 20:30:00', 1);
INSERT INTO `performances` (`event_id`, `act_id`, `position`, `slot`, `activated`) VALUES (4, 3, 1, '2015-11-04 18:30:00', 1);
INSERT INTO `performances` (`event_id`, `act_id`, `position`, `slot`, `activated`) VALUES (4, 1, 2, '2015-11-04 19:30:00', 1);
INSERT INTO `performances` (`event_id`, `act_id`, `position`, `slot`, `activated`) VALUES (5, 2, 1, '2015-11-07 18:00:00', 1);
INSERT INTO `performances` (`event_id`, `act_id`, `position`, `slot`, `activated`) VALUES (5, 1, 2, '2015-11-07 19:00:00', 1);
INSERT INTO `performances` (`event_id`, `act_id`, `position`, `slot`, `activated`) VALUES (5, 3, 3, '2015-11-07 20:00:00', 1);
INSERT INTO `performances` (`event_id`, `act_id`, `position`, `slot`, `activated`) VALUES (5, 4, 4, '2015-11-07 21:00:00', 1);

INSERT INTO `attendees` (`event_id`, `account_id`, `state`, `status`, `role`, `privilege_level`, `type`, `activated`) VALUES (1, 1, 1, 'Hosting', 3, 3, 3, 1);
INSERT INTO `attendees` (`event_id`, `account_id`, `state`, `status`, `role`, `privilege_level`, `type`, `activated`) VALUES (2, 1, 1, 'Hosting', 3, 3, 3, 1);
INSERT INTO `attendees` (`event_id`, `account_id`, `state`, `status`, `role`, `privilege_level`, `type`, `activated`) VALUES (3, 1, 1, 'Hosting', 3, 3, 3, 1);
INSERT INTO `attendees` (`event_id`, `account_id`, `state`, `status`, `role`, `privilege_level`, `type`, `activated`) VALUES (4, 1, 1, 'Hosting', 3, 3, 3, 1);
INSERT INTO `attendees` (`event_id`, `account_id`, `state`, `status`, `role`, `privilege_level`, `type`, `activated`) VALUES (5, 1, 1, 'Hosting', 3, 3, 3, 1);

INSERT INTO `hosters` (`event_id`, `venue_id`, `activated`) VALUES (1, 4, 1);
INSERT INTO `hosters` (`event_id`, `venue_id`, `activated`) VALUES (2, 1, 1);
INSERT INTO `hosters` (`event_id`, `venue_id`, `activated`) VALUES (3, 4, 1);
INSERT INTO `hosters` (`event_id`, `venue_id`, `activated`) VALUES (4, 1, 1);
INSERT INTO `hosters` (`event_id`, `venue_id`, `activated`) VALUES (5, 1, 1);
