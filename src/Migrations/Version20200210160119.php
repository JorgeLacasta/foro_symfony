<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200210160119 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nombrecompleto VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comentario ADD id_publicacion_id INT NOT NULL');
        $this->addSql('ALTER TABLE comentario ADD CONSTRAINT FK_4B91E702A7AD08E1 FOREIGN KEY (id_publicacion_id) REFERENCES publicacion (id)');
        $this->addSql('CREATE INDEX IDX_4B91E702A7AD08E1 ON comentario (id_publicacion_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE comentario DROP FOREIGN KEY FK_4B91E702A7AD08E1');
        $this->addSql('DROP INDEX IDX_4B91E702A7AD08E1 ON comentario');
        $this->addSql('ALTER TABLE comentario DROP id_publicacion_id');
    }
}
