/* 2. Написать запрос sql, отображающий все пары Контактов, которые дружат друг с другом. Исключить дубликаты. */

select f1.contact_id as f1_id, c1.name as f1_name, f2.contact_id as f2_id, c2.name as f2_name
from friendship f1
    join friendship f2 on f1.friend_id = f2.contact_id AND f1.contact_id = f2.friend_id
    join contacts c1 on c1.id = f1.contact_id
    join contacts c2 on c2.id = f2.contact_id
where f1.contact_id < f2.contact_id
