USE blog;
SET NAMES 'utf8mb4';

INSERT INTO categories (name, description) VALUES
('бэкенд и боль', 'код, который работает на сервере и честном слове'),
('девопс для гуманитариев', 'контейнеры, пайплайны и почему всё опять упало'),
('фронтенд-магия', 'Красим кнопки, двигаем дивы, воюем с центрированием');

INSERT INTO articles (image, title, description, content, views, created_at) VALUES
(
  '12345.jpg', 
  'Как я перестал бояться и полюбил легаси', 
  'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veniam, tempore. Ipsam eos quos repudiandae ea earum eius vero doloremque ad? Minima error culpa, iusto nemo modi praesentium a eius ipsam!
    Accusamus iusto recusandae, ipsa dolore doloremque saepe corrupti iste qui, illo, consequuntur nemo! Autem natus nihil aperiam molestiae eligendi, unde cumque sed impedit ipsum repudiandae a accusamus, non cum. Tenetur?', 
  'Culpa error saepe minima blanditiis tenetur nam vel corporis, ut incidunt nisi. Cupiditate, odio. Quae commodi, quidem explicabo in omnis esse et pariatur cupiditate est. Nemo ex officia doloribus voluptatum.
    Quas, laudantium necessitatibus fugit libero voluptatibus deserunt amet molestiae enim tempora et nemo excepturi, magni numquam quo dicta modi molestias ut assumenda iste, dolores nesciunt. Voluptatum odio molestiae distinctio consectetur!
    Similique quidem neque quibusdam aut reprehenderit inventore expedita? Facilis iste commodi illo ad omnis tenetur eligendi ratione quo, eum ipsa labore rem, minus illum culpa tempore consequuntur blanditiis consequatur animi!', 
  342, 
  NOW()
),
(
  'docker_pain.jpg', 
  'Оно работает на моей машине: переезжаем в Docker', 
 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veniam, tempore. Ipsam eos quos repudiandae ea earum eius vero doloremque ad? Minima error culpa, iusto nemo modi praesentium a eius ipsam!
    Accusamus iusto recusandae, ipsa dolore doloremque saepe corrupti iste qui, illo, consequuntur nemo! Autem natus nihil aperiam molestiae eligendi, unde cumque sed impedit ipsum repudiandae a accusamus, non cum. Tenetur?', 
  'Culpa error saepe minima blanditiis tenetur nam vel corporis, ut incidunt nisi. Cupiditate, odio. Quae commodi, quidem explicabo in omnis esse et pariatur cupiditate est. Nemo ex officia doloribus voluptatum.
    Quas, laudantium necessitatibus fugit libero voluptatibus deserunt amet molestiae enim tempora et nemo excepturi, magni numquam quo dicta modi molestias ut assumenda iste, dolores nesciunt. Voluptatum odio molestiae distinctio consectetur!
    Similique quidem neque quibusdam aut reprehenderit inventore expedita? Facilis iste commodi illo ad omnis tenetur eligendi ratione quo, eum ipsa labore rem, minus illum culpa tempore consequuntur blanditiis consequatur animi!', 
  512, 
  NOW() - INTERVAL 1 DAY
),
(
  'flexbox.jpg', 
  'Центрируем div в 2026 году и не плачем', 
  'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veniam, tempore. Ipsam eos quos repudiandae ea earum eius vero doloremque ad? Minima error culpa, iusto nemo modi praesentium a eius ipsam!
    Accusamus iusto recusandae, ipsa dolore doloremque saepe corrupti iste qui, illo, consequuntur nemo! Autem natus nihil aperiam molestiae eligendi, unde cumque sed impedit ipsum repudiandae a accusamus, non cum. Tenetur?', 
  'Culpa error saepe minima blanditiis tenetur nam vel corporis, ut incidunt nisi. Cupiditate, odio. Quae commodi, quidem explicabo in omnis esse et pariatur cupiditate est. Nemo ex officia doloribus voluptatum.
    Quas, laudantium necessitatibus fugit libero voluptatibus deserunt amet molestiae enim tempora et nemo excepturi, magni numquam quo dicta modi molestias ut assumenda iste, dolores nesciunt. Voluptatum odio molestiae distinctio consectetur!
    Similique quidem neque quibusdam aut reprehenderit inventore expedita? Facilis iste commodi illo ad omnis tenetur eligendi ratione quo, eum ipsa labore rem, minus illum culpa tempore consequuntur blanditiis consequatur animi!',
  89, 
  NOW() - INTERVAL 3 DAY
),
(
  'test.jpg', 
  'Выгорание или просто созвон в 9 утра?', 
  'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veniam, tempore. Ipsam eos quos repudiandae ea earum eius vero doloremque ad? Minima error culpa, iusto nemo modi praesentium a eius ipsam!
    Accusamus iusto recusandae, ipsa dolore doloremque saepe corrupti iste qui, illo, consequuntur nemo! Autem natus nihil aperiam molestiae eligendi, unde cumque sed impedit ipsum repudiandae a accusamus, non cum. Tenetur?', 
  'Culpa error saepe minima blanditiis tenetur nam vel corporis, ut incidunt nisi. Cupiditate, odio. Quae commodi, quidem explicabo in omnis esse et pariatur cupiditate est. Nemo ex officia doloribus voluptatum.
    Quas, laudantium necessitatibus fugit libero voluptatibus deserunt amet molestiae enim tempora et nemo excepturi, magni numquam quo dicta modi molestias ut assumenda iste, dolores nesciunt. Voluptatum odio molestiae distinctio consectetur!
    Similique quidem neque quibusdam aut reprehenderit inventore expedita? Facilis iste commodi illo ad omnis tenetur eligendi ratione quo, eum ipsa labore rem, minus illum culpa tempore consequuntur blanditiis consequatur animi!',
  1024, 
  NOW() - INTERVAL 4 DAY
);

INSERT INTO article_category (article_id, category_id) VALUES (1, 1);

INSERT INTO article_category (article_id, category_id) VALUES (2, 2);

INSERT INTO article_category (article_id, category_id) VALUES (3, 3);

INSERT INTO article_category (article_id, category_id) VALUES (4, 1);

INSERT INTO article_category (article_id, category_id) VALUES (4, 3);
