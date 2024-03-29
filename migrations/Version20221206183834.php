<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221206183834 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, order_status VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_F529939819EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_entry (id INT AUTO_INCREMENT NOT NULL, command_id INT DEFAULT NULL, product_name VARCHAR(255) NOT NULL, product_category VARCHAR(255) NOT NULL, quantity INT NOT NULL, transaction_amount DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_A8BFE98D33E1689A (command_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F529939819EB6921 FOREIGN KEY (client_id) REFERENCES `order` (id)');
        $this->addSql('ALTER TABLE order_entry ADD CONSTRAINT FK_A8BFE98D33E1689A FOREIGN KEY (command_id) REFERENCES `order` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F529939819EB6921');
        $this->addSql('ALTER TABLE order_entry DROP FOREIGN KEY FK_A8BFE98D33E1689A');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE order_entry');
    }
}
