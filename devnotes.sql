-- MySQL dump 10.13  Distrib 8.4.0, for Win64 (x86_64)
--
-- Host: localhost    Database: devnotes
-- ------------------------------------------------------
-- Server version	8.4.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('ausathdzil@gmail.com|127.0.0.1','i:1;',1733671132),('ausathdzil@gmail.com|127.0.0.1:timer','i:1733671132;',1733671132);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_post_id_foreign` (`post_id`),
  KEY `comments_user_id_foreign` (`user_id`),
  CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (6,'Nice to meet you, Ausath!',1,2,'2024-11-30 01:13:58','2024-11-30 01:13:58'),(8,'Great guide! I understand it now.',8,1,'2024-11-30 21:27:26','2024-11-30 21:27:26'),(9,'Wonderful guide! Thanks a lot.',7,3,'2024-12-04 20:39:07','2024-12-04 20:39:07');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2024_11_27_124544_create_posts_table',2),(5,'2024_11_30_072204_create_comments_table',3),(6,'2024_12_08_052117_alter_users_table',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_user_id_foreign` (`user_id`),
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,1,'Hello World','This is my first blog post, let me introduce myself. My name is Ausath Abdi Dzil Ikram and I am a web developer. I love to write code and learn new things. I am excited to share my knowledge with you all. I hope you enjoy more of my blog posts in the future.\n\n## Why I Started This Blog\n\nI started this blog as part of my learning journey. Writing in markdowns is fun and easy. I can write my thoughts and ideas in a simple way. I can also share my knowledge with others. But the most important thing is that I can improve my writing skills and learn new things by researching and writing about them.\n\n## What to Expect\n\nI will mostly be writing about **web development**, but also other topics if it interests me. If you have any questions or suggestions, feel free to [email me](mailto:ausathdzi@gmail.com). I am always open to feedback and suggestions.','2024-11-27 19:54:36','2024-11-30 00:34:07'),(7,1,'Mastering Recursion in Programming','Recursion is a fundamental concept in programming where a function calls itself to solve smaller instances of a problem. It’s particularly useful in tasks like traversing trees, solving mathematical problems, and breaking down complex tasks into simpler ones.\n\n## Anatomy of a Recursive Function\n\nA recursive function typically has two parts:\n1. **Base Case**: The condition under which the recursion stops.\n2. **Recursive Case**: The logic where the function calls itself.\n\n### Example: Calculating Factorials\nThe factorial of a number `n` (denoted as `n!`) is the product of all positive integers less than or equal to `n`. For example, `5! = 5 × 4 × 3 × 2 × 1 = 120`.\n\nHere\'s how you can calculate it using recursion:\n\n```typescript\nfunction factorial(n: number): number {\n  if (n <= 1) return 1; // Base case\n  return n * factorial(n - 1); // Recursive case\n}\n\nconsole.log(factorial(5)); // Output: 120\n```\n\n## Understanding the Recursive Process\n\nWhen `factorial(5)` is called:\n1. `factorial(5)` calls `factorial(4)`.\n2. `factorial(4)` calls `factorial(3)`.\n3. This continues until `factorial(1)` is reached, which returns `1`.\n4. The results are then multiplied as the stack unwinds:\n   - `1 × 2 = 2`\n   - `2 × 3 = 6`\n   - `6 × 4 = 24`\n   - `24 × 5 = 120`\n\n## Common Pitfalls and How to Avoid Them\n\n1. **Missing Base Case**: Without a base case, the recursion will go on indefinitely, causing a stack overflow.\n   ```typescript\n   function infiniteRecursion() {\n     console.log(\"This will never stop!\");\n     infiniteRecursion();\n   }\n   ```\n   Always ensure your function has a clear stopping condition.\n\n2. **Too Much Recursion**: Deep recursion can lead to a stack overflow. For example, calculating Fibonacci numbers naively:\n   ```typescript\n   function fibonacci(n: number): number {\n     if (n <= 1) return n; // Base cases\n     return fibonacci(n - 1) + fibonacci(n - 2); // Recursive case\n   }\n   console.log(fibonacci(40)); // May cause performance issues!\n   ```\n   **Solution**: Use **memoization** or an **iterative approach** for efficiency.\n\n## Advanced Example: Solving a Maze\n\nLet\'s solve a maze using recursion. The maze is represented as a grid where:\n- `0` represents a path.\n- `1` represents a wall.\n- The goal is to find a path from the start (top-left) to the end (bottom-right).\n\n### Implementation:\n```typescript\ntype Maze = number[][];\ntype Point = { x: number; y: number };\n\nfunction solveMaze(maze: Maze, pos: Point, visited: Set<string> = new Set()): boolean {\n  const { x, y } = pos;\n  \n  // Base case: Reached the end of the maze\n  if (x === maze.length - 1 && y === maze[0].length - 1) return true;\n\n  // Check bounds and if the position is a wall or already visited\n  if (x < 0 || y < 0 || x >= maze.length || y >= maze[0].length || maze[x][y] === 1 || visited.has(`${x},${y}`)) {\n    return false;\n  }\n\n  // Mark the position as visited\n  visited.add(`${x},${y}`);\n\n  // Explore all directions\n  return (\n    solveMaze(maze, { x: x + 1, y }, visited) || // Down\n    solveMaze(maze, { x: x, y: y + 1 }, visited) || // Right\n    solveMaze(maze, { x: x - 1, y }, visited) || // Up\n    solveMaze(maze, { x: x, y: y - 1 }, visited) // Left\n  );\n}\n\n// Example Maze\nconst maze: Maze = [\n  [0, 1, 0, 0],\n  [0, 1, 0, 1],\n  [0, 0, 0, 1],\n  [1, 1, 0, 0],\n];\n\nconsole.log(solveMaze(maze, { x: 0, y: 0 })); // Output: true\n```\n\n## Tips for Mastering Recursion\n- Visualize the **call stack**: Understand how function calls are nested.\n- Start with simple problems like factorial or Fibonacci.\n- Debug step-by-step using tools or by printing intermediate values.\n- Optimize deep recursion with techniques like memoization or iteration.\n\nRecursion is a powerful tool, and with practice, you can apply it to solve complex problems elegantly!','2024-11-29 09:47:53','2024-12-02 10:53:46'),(8,3,'Understanding Higher-Order Functions in JavaScript and TypeScript','Higher-order functions are a powerful concept in functional programming. A higher-order function is a function that either:\n1. Takes one or more functions as arguments.\n2. Returns a function as its result.\n\nThis enables more abstract, flexible, and reusable code.\n\n---\n\n## Why Higher-Order Functions?\n\nThey help you:\n- Write cleaner and more modular code.\n- Reduce code duplication.\n- Enhance readability and maintainability.\n\n### Example: `map`, `filter`, and `reduce`\n\nThese are common higher-order functions in JavaScript.\n\n---\n\n## 1. The `map` Function\n\n`map` transforms an array by applying a function to each element.\n\n### Example: Doubling Numbers\n```typescript\nconst numbers = [1, 2, 3, 4, 5];\nconst doubled = numbers.map((num) => num * 2);\nconsole.log(doubled); // Output: [2, 4, 6, 8, 10]\n```\n\n---\n\n## 2. The `filter` Function\n\n`filter` returns a new array with elements that satisfy a given condition.\n\n### Example: Filtering Even Numbers\n```typescript\nconst numbers = [1, 2, 3, 4, 5];\nconst evens = numbers.filter((num) => num % 2 === 0);\nconsole.log(evens); // Output: [2, 4]\n```\n\n---\n\n## 3. The `reduce` Function\n\n`reduce` accumulates array values into a single result.\n\n### Example: Summing Numbers\n```typescript\nconst numbers = [1, 2, 3, 4, 5];\nconst sum = numbers.reduce((acc, num) => acc + num, 0);\nconsole.log(sum); // Output: 15\n```\n\n---\n\n## 4. Returning Functions (Closure)\n\nA higher-order function can return another function. This is known as a **closure**.\n\n### Example: Creating a Multiplier\n```typescript\nfunction createMultiplier(factor: number) {\n  return (num: number) => num * factor;\n}\n\nconst double = createMultiplier(2);\nconst triple = createMultiplier(3);\n\nconsole.log(double(5)); // Output: 10\nconsole.log(triple(5)); // Output: 15\n```\n\n---\n\n## 5. Custom Higher-Order Functions\n\nYou can create your own higher-order functions to abstract logic.\n\n### Example: Reusable Timer\n```typescript\nfunction timeFunction(fn: () => void): void {\n  const start = performance.now();\n  fn();\n  const end = performance.now();\n  console.log(`Execution time: ${end - start}ms`);\n}\n\ntimeFunction(() => {\n  for (let i = 0; i < 1e6; i++) {} // Example workload\n});\n```\n\n---\n\n## 6. Using Higher-Order Functions with Promises\n\nHigher-order functions shine with asynchronous operations.\n\n### Example: Sequential Execution\n```typescript\nasync function fetchData(url: string): Promise<string> {\n  const response = await fetch(url);\n  return response.text();\n}\n\nfunction sequentialExecutor(urls: string[], fetchFn: (url: string) => Promise<string>) {\n  return urls.reduce(async (chain, url) => {\n    const results = await chain;\n    const data = await fetchFn(url);\n    return [...results, data];\n  }, Promise.resolve([] as string[]));\n}\n\nconst urls = [\"https://api.example.com/data1\", \"https://api.example.com/data2\"];\nsequentialExecutor(urls, fetchData).then((data) => console.log(data));\n```\n\n---\n\n## Advanced Example: Composing Functions\n\nComposition is combining two or more functions to create a new function.\n\n### Example: Composing Transformations\n```typescript\nconst toUpperCase = (str: string) => str.toUpperCase();\nconst addExclamation = (str: string) => `${str}!`;\n\nfunction compose<T>(...fns: ((arg: T) => T)[]): (input: T) => T {\n  return (input: T) => fns.reduce((acc, fn) => fn(acc), input);\n}\n\nconst excitedUpperCase = compose(toUpperCase, addExclamation);\nconsole.log(excitedUpperCase(\"hello\")); // Output: \"HELLO!\"\n```\n\n---\n\n## Summary\n\nHigher-order functions unlock powerful programming patterns. They:\n- Enable cleaner and more reusable code.\n- Promote functional programming principles.\n- Are especially useful in operations like array manipulation, event handling, and asynchronous programming.\n\nPractice these examples and explore how they can enhance your programming skills!','2024-11-30 01:19:05','2024-11-30 01:19:05');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('ihWJ90oeX3yTj4K4a4pcPx2Lf1qKGsCbSK2xtSbL',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiVmxZRzg0WXNQdWdlRWNGMkZoZmtmaTVWZkNrQ1JkNWxKWFViVmlIaCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=',1733672499);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Ausath Ikram','ausathdzil@gmail.com',NULL,'$2y$12$nztjBf.irAKfvwFO1CpAbeRUUlJuNj6QUhAC9rdWfhSHZGzT/BDqu','Hello, my name is Ausath.','FUpkHNny2aQu1zaWfVI3ekgRr2GWsfNnd6Hp4XUE2tlCdSdSyTa8ohLS1teR','2024-11-27 03:18:08','2024-12-07 22:30:35'),(2,'John Doe','johndoe@mail.com',NULL,'$2y$12$12/E1WsmSOvn4pj2wlNNB.1gqD/dy9lTEVDuUUkuwhuG2sDCxX6mm',NULL,NULL,'2024-11-28 07:58:14','2024-11-28 07:58:14'),(3,'Jane Doe','janedoe@mail.com',NULL,'$2y$12$1T1A5btPW3CLiGx1PnQPiuSKqSffQGlChGb3wX.r8otUZQ5c5aHQC',NULL,NULL,'2024-11-29 09:36:56','2024-11-29 09:36:56'),(4,'John Appleseed','johnappleseed@mail.com',NULL,'$2y$12$y67BxkjPH8.EqWBk3dZyfua.Wmv/BC2vzOrIQzn8ch8R8qCvp6uz6',NULL,NULL,'2024-12-08 08:20:31','2024-12-08 08:20:31');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-09 12:48:44
