/* 1. Написать запрос sql, отображающий список Контактов, имеющих больше 5 друзей. */

select id, name, count(friend_id) as friends
from contacts
         join friendship f on contacts.id = f.contact_id
group by id, name
having count(friend_id) > 5;
