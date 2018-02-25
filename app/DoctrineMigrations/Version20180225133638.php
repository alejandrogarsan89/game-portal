<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180225133638 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE company (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, foundationDate DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE platform (id INT AUTO_INCREMENT NOT NULL, com_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, releaseDate DATE NOT NULL, INDEX IDX_3952D0CB748C0F37 (com_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE videogame (id INT AUTO_INCREMENT NOT NULL, com_id INT DEFAULT NULL, pla_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_94D9ED72748C0F37 (com_id), INDEX IDX_94D9ED72FCB8BA6A (pla_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE platform ADD CONSTRAINT FK_3952D0CB748C0F37 FOREIGN KEY (com_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE videogame ADD CONSTRAINT FK_94D9ED72748C0F37 FOREIGN KEY (com_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE videogame ADD CONSTRAINT FK_94D9ED72FCB8BA6A FOREIGN KEY (pla_id) REFERENCES platform (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE platform DROP FOREIGN KEY FK_3952D0CB748C0F37');
        $this->addSql('ALTER TABLE videogame DROP FOREIGN KEY FK_94D9ED72748C0F37');
        $this->addSql('ALTER TABLE videogame DROP FOREIGN KEY FK_94D9ED72FCB8BA6A');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE platform');
        $this->addSql('DROP TABLE videogame');
    }
}
