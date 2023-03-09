<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230309130046 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artista (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, apellidos VARCHAR(255) DEFAULT NULL, alias VARCHAR(255) NOT NULL, clave VARCHAR(255) NOT NULL, fecha_nacimiento DATE NOT NULL, pais VARCHAR(255) NOT NULL, compositor TINYINT(1) NOT NULL, `admin` TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE banda (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, anio_creacion INT NOT NULL, pais VARCHAR(50) NOT NULL, genero VARCHAR(255) NOT NULL, activo TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE banda_artista (banda_id INT NOT NULL, artista_id INT NOT NULL, INDEX IDX_C99A4A619EFB0C1D (banda_id), INDEX IDX_C99A4A61AEB0CF13 (artista_id), PRIMARY KEY(banda_id, artista_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cancion (id INT AUTO_INCREMENT NOT NULL, disco_id INT DEFAULT NULL, titulo VARCHAR(255) NOT NULL, duracion VARCHAR(5) NOT NULL, letra LONGTEXT DEFAULT NULL, INDEX IDX_E4620FA086CCF19B (disco_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE disco (id INT AUTO_INCREMENT NOT NULL, banda_id INT DEFAULT NULL, titulo VARCHAR(255) NOT NULL, anio_lanzamiento INT NOT NULL, tipo VARCHAR(10) NOT NULL, INDEX IDX_29D40CBD9EFB0C1D (banda_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE banda_artista ADD CONSTRAINT FK_C99A4A619EFB0C1D FOREIGN KEY (banda_id) REFERENCES banda (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE banda_artista ADD CONSTRAINT FK_C99A4A61AEB0CF13 FOREIGN KEY (artista_id) REFERENCES artista (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cancion ADD CONSTRAINT FK_E4620FA086CCF19B FOREIGN KEY (disco_id) REFERENCES disco (id)');
        $this->addSql('ALTER TABLE disco ADD CONSTRAINT FK_29D40CBD9EFB0C1D FOREIGN KEY (banda_id) REFERENCES banda (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE banda_artista DROP FOREIGN KEY FK_C99A4A619EFB0C1D');
        $this->addSql('ALTER TABLE banda_artista DROP FOREIGN KEY FK_C99A4A61AEB0CF13');
        $this->addSql('ALTER TABLE cancion DROP FOREIGN KEY FK_E4620FA086CCF19B');
        $this->addSql('ALTER TABLE disco DROP FOREIGN KEY FK_29D40CBD9EFB0C1D');
        $this->addSql('DROP TABLE artista');
        $this->addSql('DROP TABLE banda');
        $this->addSql('DROP TABLE banda_artista');
        $this->addSql('DROP TABLE cancion');
        $this->addSql('DROP TABLE disco');
    }
}
