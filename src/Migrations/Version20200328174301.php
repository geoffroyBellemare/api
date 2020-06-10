<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200328174301 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE spot (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, title VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, published DATETIME NOT NULL, content LONGTEXT NOT NULL, slug VARCHAR(255) DEFAULT NULL, INDEX IDX_B9327A73F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE spot_sub_types_linker (spot_id INT NOT NULL, ss_type_id INT NOT NULL, INDEX IDX_5C5D45C42DF1D37C (spot_id), INDEX IDX_5C5D45C4E3FC1B7A (ss_type_id), PRIMARY KEY(spot_id, ss_type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prestation (id INT AUTO_INCREMENT NOT NULL, company_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_51C88FAD979B1AD6 (company_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE town (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, postcode VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, image_profile_id INT DEFAULT NULL, company_id INT DEFAULT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, roles TINYTEXT NOT NULL COMMENT \'(DC2Type:simple_array)\', password_changed_date INT DEFAULT NULL, enabled TINYINT(1) DEFAULT \'0\' NOT NULL, confirmation_token VARCHAR(40) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649A024058E (image_profile_id), UNIQUE INDEX UNIQ_8D93D649979B1AD6 (company_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_4FBF094FF675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, spot_id INT NOT NULL, content LONGTEXT NOT NULL, published DATETIME NOT NULL, INDEX IDX_9474526CF675F31B (author_id), INDEX IDX_9474526C2DF1D37C (spot_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE spot_sub_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, url VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_C53D045FF675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE spot ADD CONSTRAINT FK_B9327A73F675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE spot_sub_types_linker ADD CONSTRAINT FK_5C5D45C42DF1D37C FOREIGN KEY (spot_id) REFERENCES spot (id)');
        $this->addSql('ALTER TABLE spot_sub_types_linker ADD CONSTRAINT FK_5C5D45C4E3FC1B7A FOREIGN KEY (ss_type_id) REFERENCES spot_sub_type (id)');
        $this->addSql('ALTER TABLE prestation ADD CONSTRAINT FK_51C88FAD979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649A024058E FOREIGN KEY (image_profile_id) REFERENCES image (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE company ADD CONSTRAINT FK_4FBF094FF675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CF675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C2DF1D37C FOREIGN KEY (spot_id) REFERENCES spot (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FF675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE spot_sub_types_linker DROP FOREIGN KEY FK_5C5D45C42DF1D37C');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C2DF1D37C');
        $this->addSql('ALTER TABLE spot DROP FOREIGN KEY FK_B9327A73F675F31B');
        $this->addSql('ALTER TABLE company DROP FOREIGN KEY FK_4FBF094FF675F31B');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CF675F31B');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FF675F31B');
        $this->addSql('ALTER TABLE prestation DROP FOREIGN KEY FK_51C88FAD979B1AD6');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649979B1AD6');
        $this->addSql('ALTER TABLE spot_sub_types_linker DROP FOREIGN KEY FK_5C5D45C4E3FC1B7A');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649A024058E');
        $this->addSql('DROP TABLE spot');
        $this->addSql('DROP TABLE spot_sub_types_linker');
        $this->addSql('DROP TABLE prestation');
        $this->addSql('DROP TABLE town');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE spot_sub_type');
        $this->addSql('DROP TABLE image');
    }
}
