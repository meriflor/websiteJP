
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";




CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user',
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

CREATE TABLE  `company_job_posts`(
  `post_id` int(100) NOT NULL PRIMARY KEY,
  `company_id` int(100) NOT NULL FOREIGN KEY,
  `post_name` varchar(100) NOT NULL,
  `post_desc` varchar(1000) NOT NULL,
  `post_req` varchar(1000) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
