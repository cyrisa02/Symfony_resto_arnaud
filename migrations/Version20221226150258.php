<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221226150258 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE menu_option (menu_id INT NOT NULL, option_id INT NOT NULL, INDEX IDX_89C15868CCD7E912 (menu_id), INDEX IDX_89C15868A7C41D6F (option_id), PRIMARY KEY(menu_id, option_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE menu_option ADD CONSTRAINT FK_89C15868CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_option ADD CONSTRAINT FK_89C15868A7C41D6F FOREIGN KEY (option_id) REFERENCES `option` (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menu_option DROP FOREIGN KEY FK_89C15868CCD7E912');
        $this->addSql('ALTER TABLE menu_option DROP FOREIGN KEY FK_89C15868A7C41D6F');
        $this->addSql('DROP TABLE menu_option');
    }
}
