<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221223152651 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE scheduleevening (id INT AUTO_INCREMENT NOT NULL, is_monday TINYINT(1) DEFAULT NULL, is_tuesday TINYINT(1) DEFAULT NULL, is_wednesday TINYINT(1) DEFAULT NULL, is_thursday TINYINT(1) DEFAULT NULL, is_friday TINYINT(1) DEFAULT NULL, is_saturday TINYINT(1) DEFAULT NULL, is_sunday TINYINT(1) DEFAULT NULL, time VARCHAR(190) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE schedule DROP timeevening');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE scheduleevening');
        $this->addSql('ALTER TABLE schedule ADD timeevening VARCHAR(190) DEFAULT NULL');
    }
}
