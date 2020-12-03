drop table if exists friendship;
drop table if exists contacts;
create table IF NOT EXISTS contacts
(
    id   serial PRIMARY KEY,
    name varchar(255) not null
);

create table IF NOT EXISTS friendship
(
    contact_id integer references contacts (id) ON DELETE cascade,
    friend_id  integer references contacts (id) ON DELETE cascade,
    PRIMARY KEY (contact_id, friend_id),
    CHECK (contact_id != friend_id)
);
