<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221227101419 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE scheduleevening DROP is_monday, DROP is_tuesday, DROP is_wednesday, DROP is_thursday, DROP is_friday, DROP is_saturday, DROP is_sunday, DROP time');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE scheduleevening ADD is_monday TINYINT(1) DEFAULT NULL, ADD is_tuesday TINYINT(1) DEFAULT NULL, ADD is_wednesday TINYINT(1) DEFAULT NULL, ADD is_thursday TINYINT(1) DEFAULT NULL, ADD is_friday TINYINT(1) DEFAULT NULL, ADD is_saturday TINYINT(1) DEFAULT NULL, ADD is_sunday TINYINT(1) DEFAULT NULL, ADD time VARCHAR(190) DEFAULT NULL');
    }
}
