	// returning an INT
    return 42;

    // returning a REAL
    return 3.14;

    // returning a NULL value for INT or REAL
    *is_null = 1;
    return 0;

    // returing a STRING (up to 255 characters)
    strcpy(result, string);
    *length = strlen(string);
    return;

    // returning a binary safe STRING
    memcpy(result, string, str_len);
    *length = str_len;
    return;

    // returning a NULL STRING
    *is_null = 1;
    return;

    // returing a DATETIME
    strcpy(result, "2000-01-01 00:00:00");
    *length = strlen(result);
    return;
