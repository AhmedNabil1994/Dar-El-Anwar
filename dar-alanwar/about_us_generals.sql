create table about_us_generals
(
    id                          bigint unsigned auto_increment
        primary key,
    gallery_area_title          varchar(191) null,
    gallery_area_subtitle       text         null,
    gallery_third_image         varchar(191) null,
    gallery_second_image        varchar(191) null,
    gallery_first_image         varchar(191) null,
    our_history_title           varchar(191) null,
    our_history_subtitle        text         null,
    upgrade_skill_logo          varchar(191) null,
    upgrade_skill_title         varchar(191) null,
    upgrade_skill_subtitle      text         null,
    upgrade_skill_button_name   varchar(191) null,
    team_member_logo            varchar(191) null,
    team_member_title           varchar(191) null,
    team_member_subtitle        text         null,
    instructor_support_title    varchar(191) null,
    instructor_support_subtitle text         null,
    created_at                  timestamp    null,
    updated_at                  timestamp    null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

