<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221227120659 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE schedule ADD evmonday VARCHAR(190) DEFAULT NULL, ADD evtuesday VARCHAR(190) DEFAULT NULL, ADD evwednesday VARCHAR(190) DEFAULT NULL, ADD evthursday VARCHAR(190) DEFAULT NULL, ADD evfriday VARCHAR(190) DEFAULT NULL, ADD evsaturday VARCHAR(190) DEFAULT NULL, ADD evsunday VARCHAR(190) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE schedule DROP evmonday, DROP evtuesday, DROP evwednesday, DROP evthursday, DROP evfriday, DROP evsaturday, DROP evsunday');
    }
}
