<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240226094156 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE meme (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) NOT NULL, date DATE NOT NULL, use_time INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE meme_tag (meme_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_7D5C9C9DDB6EC45D (meme_id), INDEX IDX_7D5C9C9DBAD26311 (tag_id), PRIMARY KEY(meme_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE meme_tag ADD CONSTRAINT FK_7D5C9C9DDB6EC45D FOREIGN KEY (meme_id) REFERENCES meme (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE meme_tag ADD CONSTRAINT FK_7D5C9C9DBAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE meme_tag DROP FOREIGN KEY FK_7D5C9C9DDB6EC45D');
        $this->addSql('ALTER TABLE meme_tag DROP FOREIGN KEY FK_7D5C9C9DBAD26311');
        $this->addSql('DROP TABLE meme');
        $this->addSql('DROP TABLE meme_tag');
        $this->addSql('DROP TABLE tag');
    }
}
