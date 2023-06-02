
BEGIN TRANSACTION;


CREATE TABLE `images` (
	`id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
    `file_name` TEXT,
	`file_ext` TEXT,
    `description` TEXT
);
INSERT INTO `images` (id, file_name, file_ext, description) VALUES (1, "1.png", "png", "main street view at magic kingdom, FL");
INSERT INTO `images` (id, file_name, file_ext, description) VALUES (2, "2.png", "png", "christmas parade at magic kingdom, FL");
INSERT INTO `images` (id, file_name, file_ext, description) VALUES (3, "3.png", "png", "spaceship earth at epcot, FL");
INSERT INTO `images` (id, file_name, file_ext, description) VALUES (4, "4.png", "png", "france pavilion at epcot, FL");
INSERT INTO `images` (id, file_name, file_ext, description) VALUES (5, "5.png", "png", "hollywood tower at hollywood studios, FL");
INSERT INTO `images` (id, file_name, file_ext, description) VALUES (6, "6.png", "png", "galaxy's edge at hollywood studios, FL");
INSERT INTO `images` (id, file_name, file_ext, description) VALUES (7, "7.png", "png", "theater at hollywood studios, FL");
INSERT INTO `images` (id, file_name, file_ext, description) VALUES (8, "8.png", "png", "pandora at animal kingdom, FL");
INSERT INTO `images` (id, file_name, file_ext, description) VALUES (9, "9.png", "png", "tree of life at animal kingdom, FL");
INSERT INTO `images` (id, file_name, file_ext, description) VALUES (10, "10.png", "png", "kiliminjaro safari at animal kingdom, FL");
INSERT INTO `images` (id, file_name, file_ext, description) VALUES (11, "11.png", "png", "ice cream sundae, FL");
INSERT INTO `images` (id, file_name, file_ext, description) VALUES (12, "12.png", "png", "mickey waffle, FL");
INSERT INTO `images` (id, file_name, file_ext, description) VALUES (13, "13.png", "png", "paradise pier, CA");
INSERT INTO `images` (id, file_name, file_ext, description) VALUES (14, "14.png", "png", "cars land during the day, CA");
INSERT INTO `images` (id, file_name, file_ext, description) VALUES (15, "15.png", "png", "world of color, CA");
INSERT INTO `images` (id, file_name, file_ext, description) VALUES (16, "16.png", "png", "it's a small world, CA");
INSERT INTO `images` (id, file_name, file_ext, description) VALUES (17, "17.png", "png", "cars land during the nighttime, CA");
INSERT INTO `images` (id, file_name, file_ext, description) VALUES (18, "18.png", "png", "california adventure entrance, CA");
INSERT INTO `images` (id, file_name, file_ext, description) VALUES (19, "19.png", "png", "raspberry sorbet, CA");
INSERT INTO `images` (id, file_name, file_ext, description) VALUES (20, "20.png", "png", "disneyland castle, CA");



CREATE TABLE `tags` (
	`id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	`tag` TEXT
);
INSERT INTO `tags` (id, tag) VALUES (1, 'magic kingdom');
INSERT INTO `tags` (id, tag) VALUES (2, 'animal kingdom');
INSERT INTO `tags` (id, tag) VALUES (3, 'epcot');
INSERT INTO `tags` (id, tag) VALUES (4, 'hollywood studios');
INSERT INTO `tags` (id, tag) VALUES (5, 'food');
INSERT INTO `tags` (id, tag) VALUES (6, 'florida');
INSERT INTO `tags` (id, tag) VALUES (7, 'california');


CREATE TABLE `image_tags` (
	`id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	`image_id` INTEGER,
	`tag_id` INTEGER
);
INSERT INTO `image_tags` (id, image_id, tag_id) VALUES (1, 1, 1);
INSERT INTO `image_tags` (id, image_id, tag_id) VALUES (2, 1, 6);

INSERT INTO `image_tags` (id, image_id, tag_id) VALUES (3, 2, 1);
INSERT INTO `image_tags` (id, image_id, tag_id) VALUES (4, 2, 6);

INSERT INTO `image_tags` (id, image_id, tag_id) VALUES (5, 3, 3);
INSERT INTO `image_tags` (id, image_id, tag_id) VALUES (6, 3, 6);

INSERT INTO `image_tags` (id, image_id, tag_id) VALUES (7, 4, 3);
INSERT INTO `image_tags` (id, image_id, tag_id) VALUES (8, 4, 6);

INSERT INTO `image_tags` (id, image_id, tag_id) VALUES (9, 5, 4);
INSERT INTO `image_tags` (id, image_id, tag_id) VALUES (10, 5, 6);

INSERT INTO `image_tags` (id, image_id, tag_id) VALUES (11, 6, 4);
INSERT INTO `image_tags` (id, image_id, tag_id) VALUES (12, 6, 6);

INSERT INTO `image_tags` (id, image_id, tag_id) VALUES (13, 7, 4);
INSERT INTO `image_tags` (id, image_id, tag_id) VALUES (14, 7, 6);

INSERT INTO `image_tags` (id, image_id, tag_id) VALUES (15, 8, 2);
INSERT INTO `image_tags` (id, image_id, tag_id) VALUES (16, 8, 6);

INSERT INTO `image_tags` (id, image_id, tag_id) VALUES (17, 9, 2);
INSERT INTO `image_tags` (id, image_id, tag_id) VALUES (18, 9, 6);

INSERT INTO `image_tags` (id, image_id, tag_id) VALUES (19, 10, 2);
INSERT INTO `image_tags` (id, image_id, tag_id) VALUES (20, 10, 6);

INSERT INTO `image_tags` (id, image_id, tag_id) VALUES (21, 11, 1);
INSERT INTO `image_tags` (id, image_id, tag_id) VALUES (22, 11, 5);
INSERT INTO `image_tags` (id, image_id, tag_id) VALUES (23, 11, 6);

INSERT INTO `image_tags` (id, image_id, tag_id) VALUES (24, 12, 5);

INSERT INTO `image_tags` (id, image_id, tag_id) VALUES (25, 13, 7);

INSERT INTO `image_tags` (id, image_id, tag_id) VALUES (26, 14, 7);

INSERT INTO `image_tags` (id, image_id, tag_id) VALUES (27, 15, 7);

INSERT INTO `image_tags` (id, image_id, tag_id) VALUES (28, 16, 7);

INSERT INTO `image_tags` (id, image_id, tag_id) VALUES (29, 17, 7);

INSERT INTO `image_tags` (id, image_id, tag_id) VALUES (30, 18, 7);

INSERT INTO `image_tags` (id, image_id, tag_id) VALUES (31, 19, 7);
INSERT INTO `image_tags` (id, image_id, tag_id) VALUES (32, 19, 5);

INSERT INTO `image_tags` (id, image_id, tag_id) VALUES (33, 20, 7);



COMMIT;
