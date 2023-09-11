<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230827102901 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE category_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE certificate_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE course_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE course_category_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE course_feedback_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE enrollments_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE instructor_course_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE instructor_feedback_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE lesson_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE lesson_feedback_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE notification_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE quizz_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE section_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE student_response_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE student_result_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "users_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE category (id INT NOT NULL, title VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN category.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN category.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE certificate (id INT NOT NULL, user_id INT NOT NULL, course_id INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_219CDA4AA76ED395 ON certificate (user_id)');
        $this->addSql('CREATE INDEX IDX_219CDA4A591CC992 ON certificate (course_id)');
        $this->addSql('COMMENT ON COLUMN certificate.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE course (id INT NOT NULL, title VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, price NUMERIC(10, 2) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN course.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN course.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE course_category (id INT NOT NULL, course_id INT NOT NULL, category_id INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_AFF87497591CC992 ON course_category (course_id)');
        $this->addSql('CREATE INDEX IDX_AFF8749712469DE2 ON course_category (category_id)');
        $this->addSql('COMMENT ON COLUMN course_category.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN course_category.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE course_feedback (id INT NOT NULL, user_id INT NOT NULL, course_id INT NOT NULL, stars INT DEFAULT NULL, comment VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_7B9D290EA76ED395 ON course_feedback (user_id)');
        $this->addSql('CREATE INDEX IDX_7B9D290E591CC992 ON course_feedback (course_id)');
        $this->addSql('COMMENT ON COLUMN course_feedback.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN course_feedback.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE enrollments (id INT NOT NULL, course_id INT NOT NULL, user_id INT NOT NULL, status VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_CCD8C132591CC992 ON enrollments (course_id)');
        $this->addSql('CREATE INDEX IDX_CCD8C132A76ED395 ON enrollments (user_id)');
        $this->addSql('COMMENT ON COLUMN enrollments.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN enrollments.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE instructor_course (id INT NOT NULL, course_id INT NOT NULL, user_id INT NOT NULL, status VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_6926B0E5591CC992 ON instructor_course (course_id)');
        $this->addSql('CREATE INDEX IDX_6926B0E5A76ED395 ON instructor_course (user_id)');
        $this->addSql('COMMENT ON COLUMN instructor_course.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN instructor_course.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE instructor_feedback (id INT NOT NULL, student_id INT NOT NULL, instructor_course_id INT NOT NULL, stars INT DEFAULT NULL, comment TEXT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D24BE6FDCB944F1A ON instructor_feedback (student_id)');
        $this->addSql('CREATE INDEX IDX_D24BE6FDFFA0FC57 ON instructor_feedback (instructor_course_id)');
        $this->addSql('COMMENT ON COLUMN instructor_feedback.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN instructor_feedback.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE lesson (id INT NOT NULL, section_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, introduction TEXT DEFAULT NULL, content TEXT DEFAULT NULL, conclusion TEXT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, image_path VARCHAR(255) DEFAULT NULL, video_path VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_F87474F3D823E37A ON lesson (section_id)');
        $this->addSql('COMMENT ON COLUMN lesson.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN lesson.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE lesson_feedback (id INT NOT NULL, user_id INT NOT NULL, lesson_id INT NOT NULL, comment TEXT DEFAULT NULL, stars INT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_9A6E0E41A76ED395 ON lesson_feedback (user_id)');
        $this->addSql('CREATE INDEX IDX_9A6E0E41CDF80196 ON lesson_feedback (lesson_id)');
        $this->addSql('COMMENT ON COLUMN lesson_feedback.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN lesson_feedback.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE notification (id INT NOT NULL, user_id INT NOT NULL, type VARCHAR(255) DEFAULT NULL, link VARCHAR(255) DEFAULT NULL, message TEXT DEFAULT NULL, status VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_BF5476CAA76ED395 ON notification (user_id)');
        $this->addSql('CREATE TABLE quizz (id INT NOT NULL, lesson_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, questions JSON NOT NULL, questions_and_answers JSON DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_7C77973DCDF80196 ON quizz (lesson_id)');
        $this->addSql('COMMENT ON COLUMN quizz.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN quizz.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE section (id INT NOT NULL, course_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_2D737AEF591CC992 ON section (course_id)');
        $this->addSql('COMMENT ON COLUMN section.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN section.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE student_response (id INT NOT NULL, quizz_id INT NOT NULL, user_id INT NOT NULL, student_questions_answers JSON NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8DF04760BA934BCD ON student_response (quizz_id)');
        $this->addSql('CREATE INDEX IDX_8DF04760A76ED395 ON student_response (user_id)');
        $this->addSql('COMMENT ON COLUMN student_response.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN student_response.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE student_result (id INT NOT NULL, user_id INT NOT NULL, quizz_id INT NOT NULL, status VARCHAR(255) NOT NULL, score NUMERIC(10, 2) NOT NULL, duration VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_9D5C1993A76ED395 ON student_result (user_id)');
        $this->addSql('CREATE INDEX IDX_9D5C1993BA934BCD ON student_result (quizz_id)');
        $this->addSql('COMMENT ON COLUMN student_result.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN student_result.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE "users" (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(255) DEFAULT NULL, lastname VARCHAR(255) DEFAULT NULL, bio TEXT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, status VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9E7927C74 ON "users" (email)');
        $this->addSql('COMMENT ON COLUMN "users".created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN "users".updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE messenger_messages (id BIGSERIAL NOT NULL, body TEXT NOT NULL, headers TEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, available_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, delivered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('COMMENT ON COLUMN messenger_messages.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN messenger_messages.available_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN messenger_messages.delivered_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE OR REPLACE FUNCTION notify_messenger_messages() RETURNS TRIGGER AS $$
            BEGIN
                PERFORM pg_notify(\'messenger_messages\', NEW.queue_name::text);
                RETURN NEW;
            END;
        $$ LANGUAGE plpgsql;');
        $this->addSql('DROP TRIGGER IF EXISTS notify_trigger ON messenger_messages;');
        $this->addSql('CREATE TRIGGER notify_trigger AFTER INSERT OR UPDATE ON messenger_messages FOR EACH ROW EXECUTE PROCEDURE notify_messenger_messages();');
        $this->addSql('ALTER TABLE certificate ADD CONSTRAINT FK_219CDA4AA76ED395 FOREIGN KEY (user_id) REFERENCES "users" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE certificate ADD CONSTRAINT FK_219CDA4A591CC992 FOREIGN KEY (course_id) REFERENCES course (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE course_category ADD CONSTRAINT FK_AFF87497591CC992 FOREIGN KEY (course_id) REFERENCES course (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE course_category ADD CONSTRAINT FK_AFF8749712469DE2 FOREIGN KEY (category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE course_feedback ADD CONSTRAINT FK_7B9D290EA76ED395 FOREIGN KEY (user_id) REFERENCES "users" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE course_feedback ADD CONSTRAINT FK_7B9D290E591CC992 FOREIGN KEY (course_id) REFERENCES course (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE enrollments ADD CONSTRAINT FK_CCD8C132591CC992 FOREIGN KEY (course_id) REFERENCES course (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE enrollments ADD CONSTRAINT FK_CCD8C132A76ED395 FOREIGN KEY (user_id) REFERENCES "users" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE instructor_course ADD CONSTRAINT FK_6926B0E5591CC992 FOREIGN KEY (course_id) REFERENCES course (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE instructor_course ADD CONSTRAINT FK_6926B0E5A76ED395 FOREIGN KEY (user_id) REFERENCES "users" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE instructor_feedback ADD CONSTRAINT FK_D24BE6FDCB944F1A FOREIGN KEY (student_id) REFERENCES "users" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE instructor_feedback ADD CONSTRAINT FK_D24BE6FDFFA0FC57 FOREIGN KEY (instructor_course_id) REFERENCES instructor_course (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT FK_F87474F3D823E37A FOREIGN KEY (section_id) REFERENCES section (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lesson_feedback ADD CONSTRAINT FK_9A6E0E41A76ED395 FOREIGN KEY (user_id) REFERENCES "users" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE lesson_feedback ADD CONSTRAINT FK_9A6E0E41CDF80196 FOREIGN KEY (lesson_id) REFERENCES lesson (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CAA76ED395 FOREIGN KEY (user_id) REFERENCES "users" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE quizz ADD CONSTRAINT FK_7C77973DCDF80196 FOREIGN KEY (lesson_id) REFERENCES lesson (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE section ADD CONSTRAINT FK_2D737AEF591CC992 FOREIGN KEY (course_id) REFERENCES course (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE student_response ADD CONSTRAINT FK_8DF04760BA934BCD FOREIGN KEY (quizz_id) REFERENCES quizz (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE student_response ADD CONSTRAINT FK_8DF04760A76ED395 FOREIGN KEY (user_id) REFERENCES "users" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE student_result ADD CONSTRAINT FK_9D5C1993A76ED395 FOREIGN KEY (user_id) REFERENCES "users" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE student_result ADD CONSTRAINT FK_9D5C1993BA934BCD FOREIGN KEY (quizz_id) REFERENCES quizz (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE category_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE certificate_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE course_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE course_category_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE course_feedback_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE enrollments_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE instructor_course_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE instructor_feedback_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE lesson_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE lesson_feedback_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE notification_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE quizz_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE section_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE student_response_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE student_result_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "users_id_seq" CASCADE');
        $this->addSql('ALTER TABLE certificate DROP CONSTRAINT FK_219CDA4AA76ED395');
        $this->addSql('ALTER TABLE certificate DROP CONSTRAINT FK_219CDA4A591CC992');
        $this->addSql('ALTER TABLE course_category DROP CONSTRAINT FK_AFF87497591CC992');
        $this->addSql('ALTER TABLE course_category DROP CONSTRAINT FK_AFF8749712469DE2');
        $this->addSql('ALTER TABLE course_feedback DROP CONSTRAINT FK_7B9D290EA76ED395');
        $this->addSql('ALTER TABLE course_feedback DROP CONSTRAINT FK_7B9D290E591CC992');
        $this->addSql('ALTER TABLE enrollments DROP CONSTRAINT FK_CCD8C132591CC992');
        $this->addSql('ALTER TABLE enrollments DROP CONSTRAINT FK_CCD8C132A76ED395');
        $this->addSql('ALTER TABLE instructor_course DROP CONSTRAINT FK_6926B0E5591CC992');
        $this->addSql('ALTER TABLE instructor_course DROP CONSTRAINT FK_6926B0E5A76ED395');
        $this->addSql('ALTER TABLE instructor_feedback DROP CONSTRAINT FK_D24BE6FDCB944F1A');
        $this->addSql('ALTER TABLE instructor_feedback DROP CONSTRAINT FK_D24BE6FDFFA0FC57');
        $this->addSql('ALTER TABLE lesson DROP CONSTRAINT FK_F87474F3D823E37A');
        $this->addSql('ALTER TABLE lesson_feedback DROP CONSTRAINT FK_9A6E0E41A76ED395');
        $this->addSql('ALTER TABLE lesson_feedback DROP CONSTRAINT FK_9A6E0E41CDF80196');
        $this->addSql('ALTER TABLE notification DROP CONSTRAINT FK_BF5476CAA76ED395');
        $this->addSql('ALTER TABLE quizz DROP CONSTRAINT FK_7C77973DCDF80196');
        $this->addSql('ALTER TABLE section DROP CONSTRAINT FK_2D737AEF591CC992');
        $this->addSql('ALTER TABLE student_response DROP CONSTRAINT FK_8DF04760BA934BCD');
        $this->addSql('ALTER TABLE student_response DROP CONSTRAINT FK_8DF04760A76ED395');
        $this->addSql('ALTER TABLE student_result DROP CONSTRAINT FK_9D5C1993A76ED395');
        $this->addSql('ALTER TABLE student_result DROP CONSTRAINT FK_9D5C1993BA934BCD');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE certificate');
        $this->addSql('DROP TABLE course');
        $this->addSql('DROP TABLE course_category');
        $this->addSql('DROP TABLE course_feedback');
        $this->addSql('DROP TABLE enrollments');
        $this->addSql('DROP TABLE instructor_course');
        $this->addSql('DROP TABLE instructor_feedback');
        $this->addSql('DROP TABLE lesson');
        $this->addSql('DROP TABLE lesson_feedback');
        $this->addSql('DROP TABLE notification');
        $this->addSql('DROP TABLE quizz');
        $this->addSql('DROP TABLE section');
        $this->addSql('DROP TABLE student_response');
        $this->addSql('DROP TABLE student_result');
        $this->addSql('DROP TABLE "users"');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
