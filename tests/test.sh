#!/usr/bin/env /bin/sh

cd tests;

ACTUAL=$(php console.php signature-configured:optional-array-argument-command foo bar)

if [ "$ACTUAL" != "foo, bar" ] ;
    then echo "FAILED signature-configured:optional-array-argument-command";
    echo "Expected foo, bar";
    echo "Actual $ACTUAL";
fi

ACTUAL=$(php console.php signature-configured:optional-array-argument-command foo)

if [ "$ACTUAL" != "foo" ] ;
    then echo "FAILED signature-configured:optional-array-argument-command";
    echo "Expected foo";
    echo "Actual $ACTUAL";
fi

ACTUAL=$(php console.php signature-configured:optional-array-argument-command)

if [ "$ACTUAL" != "" ] ;
    then echo "FAILED signature-configured:optional-array-argument-command";
    echo "Expected nothing";
    echo "Actual $ACTUAL";
fi

ACTUAL=$(php console.php signature-configured:optional-argument-command foo)

if [ "$ACTUAL" != "foo" ] ;
    then echo "FAILED signature-configured:optional-argument-command";
    echo "Expected foo";
    echo "Actual $ACTUAL";
fi

ACTUAL=$(php console.php signature-configured:optional-argument-command)

if [ "$ACTUAL" != "" ]
    then echo "FAILED signature-configured:optional-argument-command";
    echo "Expected nothing";
    echo "Actual $ACTUAL";
fi

ACTUAL=$(php console.php signature-configured:required-array-argument-command foo bar)

if [ "$ACTUAL" != "foo, bar" ] ;
    then echo "FAILED signature-configured:required-array-argument-command";
    echo "Expected foo, bar";
    echo "Actual $ACTUAL";
fi

ACTUAL=$(php console.php signature-configured:required-array-argument-command > /dev/null 2>&1)

if [ $? -ne 1 ];
    then echo "FAILED signature-configured:required-array-argument-command";
    echo "Expected exception but return value was not error";
fi

ACTUAL=$(php console.php array-configured:with-arguments-command arg1 arg2 arg3)

if [ "$ACTUAL" != "arg1, arg2, arg3" ] ;
    then echo "FAILED array-configured:with-arguments-command";
    echo "Expected arg1, arg2, arg3";
    echo "Actual $ACTUAL";
fi

ACTUAL=$(php console.php array-configured:with-options-command --a --b --c)

if [ "$ACTUAL" != "1, 1, 1" ] ;
    then echo "FAILED array-configured:with-options-command";
    echo "Expected 1, 1, 1";
    echo "Actual $ACTUAL";
fi

ACTUAL=$(php console.php array-configured:with-both-arguments-and-options-command arg1 arg2 arg3 --a --b --c)

if [ "$ACTUAL" != "arg1, arg2, arg3 - 1, 1, 1" ] ;
    then echo "FAILED array-configured:with-both-arguments-and-options-command";
    echo "Expected arg1, arg2, arg3 - 1, 1, 1";
    echo "Actual $ACTUAL";
fi

ACTUAL=$(php console.php array-configured:without-arguments-or-options-command)

if [ "$ACTUAL" != "" ] ;
    then echo "FAILED array-configured:without-arguments-or-options-command";
    echo "Expected nothing";
    echo "Actual $ACTUAL";
fi
