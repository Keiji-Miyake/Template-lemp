# PHP Template

Linter や Formmatter の実行方法

## PHP CodeSniffer

コーディング規約に沿っているかチェック
phpcs.xmlでルール設定

```shell
# チェック
$ composer phpcs
# 整形
$ composer phpcbf
```

## PHP MD Install

phpmdはPHP Mess Ditectorの略で、PHPコードの潜在的なバグになりそうな箇所や実装上の問題を検出してくれるツールです。 例えば未使用の変数の指摘、多数のpublicメソッドのある巨大クラスの検出、一文字変数等もこのツールで検出可能です。
phpmd.xmlが設定ファイル

```txt ./composer.json
{
    "require-dev": {
        "phpmd/phpmd" : "@stable"
    }
}
```

### phpmdの実行

```shell
# ./vendor/bin/phpmd sample.php text cleancode,codesize,controversial,design,naming,unusedcode
# ./vendor/bin/phpmd . text cleancode,codesize,controversial,design,naming,unusedcode --suffixes php --exclude vendor
# ./vendor/bin/phpmd . text phpmd.xml --suffixes php --exclude vendor
# composer phpmd
```

## PHPstan

```shell
# vendor/bin/phpstan analyse
# vendor/bin/phpstan analyse -c phpstan.neon
# composer phpstan
```


## PHPUnit

```shell
# composer phpunit
```
