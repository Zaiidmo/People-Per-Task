CREATE Database PeoplePerTask;
USE PeoplePerTasks;
CREATE TABLE Users (
    UserID INT PRIMARY KEY AUTO_INCREMENT UNIQUE,
    UserName VARCHAR(50) NOT NULL UNIQUE,
    PasswordHash VARCHAR(50) NOT NULL ,
    Email VARCHAR(100) UNIQUE,
    PhoneNumber INT NOT NULL UNIQUE 
);

CREATE TABLE Categories (
    CategoryID INT PRIMARY KEY AUTO_INCREMENT,
    CategoryName VARCHAR(255) NOT NULL
);

CREATE TABLE SousCategories (
    SousCategoryID INT PRIMARY KEY AUTO_INCREMENT,
    SousCategoryName VARCHAR(255) NOT NULL,
    CategoryID INT,
    FOREIGN KEY (CategoryID) REFERENCES Categories(CategoryID) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE Projects (
    ProjectID INT PRIMARY KEY AUTO_INCREMENT,
    ProjectTitle VARCHAR(255) NOT NULL,
    UserID INT,
    CategoryID INT,
    SousCategoryID INT,
    FOREIGN KEY (UserID) REFERENCES Users(UserID) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (CategoryID) REFERENCES Categories(CategoryID) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (SousCategoryID) REFERENCES SousCategories(SousCategoryID) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE Freelances (
    FreelanceID INT PRIMARY KEY AUTO_INCREMENT,
    FreelanceName VARCHAR(255) NOT NULL,
    Competences VARCHAR(250) NOT NULL,
    UserID INT,
    FOREIGN KEY (userID) REFERENCES Users(userID) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE Offers (
    OfferID INT PRIMARY KEY AUTO_INCREMENT,
    Amount INT NOT NULL,
    Deadline DATE NOT NULL,
    FreelanceID INT,
    ProjectID INT,
    FOREIGN KEY (FreelanceID) REFERENCES Freelances(FreelanceID) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (ProjectID) REFERENCES Projects(ProjectID) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE Testimonials (
    TestimonialID INT PRIMARY KEY AUTO_INCREMENT,
    Comment TEXT NOT NULL,
    Rating INT NOT NULL,
    UserID INT,
    FOREIGN KEY (UserID) REFERENCES Users(UserID) ON UPDATE CASCADE ON DELETE CASCADE
);

-- -- Data insertion ------------------------------------

-- INSERT INTO Users (UserName, PasswordHash, Email, PhoneNumber)
-- VALUES
--     ('JohnDoe', 'hash123', 'john.doe@example.com', 1234567890),
--     ('JaneSmith', 'hash456', 'jane.smith@example.com', 987643210),
--     ('BobJohnson', 'hash789', 'bob.johnson@example.com', 555234567),
--     ('AliceWilliams', 'hashabc', 'alice.williams@example.com', 999887777),
--     ('CharlieBrown', 'hashdef', 'charlie.brown@example.com', 111223333),
--     ('EvaMiller', 'hashghi', 'eva.miller@example.com', 444556666),
--     ('DavidLee', 'hashjkl', 'david.lee@example.com', 777888999),
--     ('GraceTaylor', 'hashmno', 'grace.taylor@example.com', 666778888),
--     ('HenryMartin', 'hashpqr', 'henry.martin@example.com', 222334444),
--     ('OliviaMoore', 'hashtuv', 'olivia.moore@example.com', 888990000);


-- INSERT INTO Categories (CategoryName)
-- VALUES
--     ('Web Development'),
--     ('Graphic Design'),
--     ('Writing and Translation'),
--     ('Digital Marketing'),
--     ('Data Entry and Admin'),
--     ('Mobile App Development'),
--     ('Video and Animation'),
--     ('Business and Consulting'),
--     ('Engineering and Architecture'),
--     ('Legal Services');


-- INSERT INTO SousCategories (SousCategoryName, CategoryID)
-- VALUES
--     ('Front-end Development', 1),
--     ('Back-end Development', 1),
--     ('UI/UX Design', 2),
--     ('Logo Design', 2),
--     ('Content Writing', 3),
--     ('Translation', 3),
--     ('Social Media Marketing', 4),
--     ('Search Engine Optimization (SEO)', 4),
--     ('Virtual Assistance', 5),
--     ('Data Entry', 5),
--     ('iOS App Development', 6),
--     ('Android App Development', 6),
--     ('Motion Graphics', 7),
--     ('3D Animation', 7),
--     ('Business Planning', 8),
--     ('Legal Consultation', 10),
--     ('Architectural Design', 9);


-- INSERT INTO Projects (ProjectTitle, UserID, CategoryID, SousCategoryID)
-- VALUES
--     ('Responsive Website Development', 1, 1, 1),
--     ('Logo Design for a Startup', 2, 2, 4),
--     ('Blog Content Creation', 3, 3, 5),
--     ('Social Media Marketing Campaign', 4, 4, 7),
--     ('Virtual Assistant for Data Entry', 5, 5, 9),
--     ('iOS App for Fitness Tracking', 6, 6, 11),
--     ('Animated Explainer Video', 7, 7, 13),
--     ('Business Plan for a New Venture', 8, 8, 15),
--     ('Architectural Design for a Modern Home', 9, 9, 17),
--     ('Legal Consultation for Contract Review', 10, 10, 17);


-- INSERT INTO Freelances (FreelanceName, Competences, UserId)
-- VALUES
--     ('Web Developer Freelancer', 'HTML, CSS, JavaScript, React', 1),
--     ('Graphic Design Pro', 'Logo Design, Illustration, Branding', 2),
--     ('Content Writing Expert', 'Blogging, Copywriting, Editing', 3),
--     ('Digital Marketing Specialist', 'Social Media, SEO, PPC', 4),
--     ('Admin and Data Entry Professional', 'Data Entry, Virtual Assistance', 5),
--     ('Mobile App Developer Pro', 'iOS App Development, Android App Development', 6),
--     ('Animation Specialist', 'Motion Graphics, 3D Animation', 7),
--     ('Business Consultant Pro', 'Business Planning, Strategy', 8),
--     ('Architectural Design Expert', 'Residential, Commercial Design', 9),
--     ('Legal Consultant', 'Contract Review, Legal Advice', 10);

-- INSERT INTO Offers (Amount, Deadline, FreelanceID, ProjectID)
-- VALUES
--     (500, '2023-12-15', 1, 1),
--     (300, '2023-12-18', 2, 2),
--     (150, '2023-12-20', 3, 3),
--     (800, '2023-12-22', 4, 4),
--     (200, '2023-12-25', 5, 5),
--     (1000, '2023-12-28', 6, 6),
--     (400, '2023-12-30', 7, 7),
--     (700, '2024-01-02', 8, 8),
--     (600, '2024-01-05', 9, 9),
--     (250, '2024-01-08', 10, 10);

-- INSERT INTO Testimonials (Comment, Rating, UserID)
-- VALUES
--     ('Excellent work! Highly recommended.', 5, 1),
--     ('Great communication and quality.', 4, 2),
--     ('Very satisfied with the results.', 5, 3),
--     ('Outstanding freelancer, delivered on time.', 5, 4),
--     ('Efficient and professional service.', 4, 5),
--     ('Impressive work, will hire again.', 5, 6),
--     ('Creative and reliable freelancer.', 4, 7),
--     ('Helped me achieve my project goals.', 5, 8),
--     ('Professional advice, highly knowledgeable.', 4, 9),
--     ('Quick response and high-quality service.', 5, 10);

-- ALTER TABLE PeoplePerTask.users
-- ADD COLUMN created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
-- ADD COLUMN deleted_at TIMESTAMP DEFAULT NULL,
-- ADD COLUMN edited_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;

-- ALTER TABLE PeoplePerTask.offers
-- ADD COLUMN created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
-- ADD COLUMN deleted_at TIMESTAMP DEFAULT NULL,
-- ADD COLUMN edited_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;

-- ALTER TABLE PeoplePerTask.projects
-- ADD COLUMN created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
-- ADD COLUMN deleted_at TIMESTAMP DEFAULT NULL,
-- ADD COLUMN edited_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;

-- ALTER TABLE PeoplePerTask.testimonials
-- ADD COLUMN created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
-- ADD COLUMN deleted_at TIMESTAMP DEFAULT NULL,
-- ADD COLUMN edited_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;
