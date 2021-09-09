<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210909081800 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE auteur (id INT AUTO_INCREMENT NOT NULL, auteur VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE editeur (id INT AUTO_INCREMENT NOT NULL, editeur VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournisseur (id INT AUTO_INCREMENT NOT NULL, editeur_id INT NOT NULL, fournisseur VARCHAR(50) NOT NULL, INDEX IDX_369ECA323375BD21 (editeur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre (id INT AUTO_INCREMENT NOT NULL, genre VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, auteur_id INT NOT NULL, genre_id INT NOT NULL, fournisseur_id INT NOT NULL, editeur_id INT DEFAULT NULL, ref_bd VARCHAR(8) NOT NULL, heros VARCHAR(50) DEFAULT NULL, titre VARCHAR(50) NOT NULL, prix_public NUMERIC(8, 2) NOT NULL, prix_editeur NUMERIC(8, 2) NOT NULL, resume LONGTEXT DEFAULT NULL, ref_fournisseur BIGINT DEFAULT NULL, ref_editeur BIGINT DEFAULT NULL, INDEX IDX_29A5EC2760BB6FE6 (auteur_id), INDEX IDX_29A5EC274296D31F (genre_id), INDEX IDX_29A5EC27670C757F (fournisseur_id), INDEX IDX_29A5EC273375BD21 (editeur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fournisseur ADD CONSTRAINT FK_369ECA323375BD21 FOREIGN KEY (editeur_id) REFERENCES editeur (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC2760BB6FE6 FOREIGN KEY (auteur_id) REFERENCES auteur (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC274296D31F FOREIGN KEY (genre_id) REFERENCES genre (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC273375BD21 FOREIGN KEY (editeur_id) REFERENCES editeur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC2760BB6FE6');
        $this->addSql('ALTER TABLE fournisseur DROP FOREIGN KEY FK_369ECA323375BD21');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC273375BD21');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27670C757F');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC274296D31F');
        $this->addSql('DROP TABLE auteur');
        $this->addSql('DROP TABLE editeur');
        $this->addSql('DROP TABLE fournisseur');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE produit');
    }
}
