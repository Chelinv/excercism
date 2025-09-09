-- Schema:
CREATE TABLE bottle_song(

    start_bottles INTEGER NOT NULL,
    take_down     INTEGER NOT NULL,
    result        TEXT
);
WITH RECURSIVE song_verses(id, verse_number, current_bottles, lyrics) AS (
    -- Base case: first verse for each row
    SELECT 
        rowid as id,
        1 as verse_number,
        start_bottles as current_bottles,
        CASE start_bottles
            WHEN 10 THEN 'Ten green bottles hanging on the wall,' || CHAR(10)
            WHEN 9  THEN 'Nine green bottles hanging on the wall,' || CHAR(10)
            WHEN 8  THEN 'Eight green bottles hanging on the wall,' || CHAR(10)
            WHEN 7  THEN 'Seven green bottles hanging on the wall,' || CHAR(10)
            WHEN 6  THEN 'Six green bottles hanging on the wall,' || CHAR(10)
            WHEN 5  THEN 'Five green bottles hanging on the wall,' || CHAR(10)
            WHEN 4  THEN 'Four green bottles hanging on the wall,' || CHAR(10)
            WHEN 3  THEN 'Three green bottles hanging on the wall,' || CHAR(10)
            WHEN 2  THEN 'Two green bottles hanging on the wall,' || CHAR(10)
            WHEN 1  THEN 'One green bottle hanging on the wall,' || CHAR(10)
        END
        ||
        CASE start_bottles
            WHEN 10 THEN 'Ten green bottles hanging on the wall,' || CHAR(10)
            WHEN 9  THEN 'Nine green bottles hanging on the wall,' || CHAR(10)
            WHEN 8  THEN 'Eight green bottles hanging on the wall,' || CHAR(10)
            WHEN 7  THEN 'Seven green bottles hanging on the wall,' || CHAR(10)
            WHEN 6  THEN 'Six green bottles hanging on the wall,' || CHAR(10)
            WHEN 5  THEN 'Five green bottles hanging on the wall,' || CHAR(10)
            WHEN 4  THEN 'Four green bottles hanging on the wall,' || CHAR(10)
            WHEN 3  THEN 'Three green bottles hanging on the wall,' || CHAR(10)
            WHEN 2  THEN 'Two green bottles hanging on the wall,' || CHAR(10)
            WHEN 1  THEN 'One green bottle hanging on the wall,' || CHAR(10)
        END
        ||
        'And if one green bottle should accidentally fall,' || CHAR(10)
        ||
        CASE start_bottles - 1
            WHEN 0  THEN 'There''ll be no green bottles hanging on the wall.'
            WHEN 1  THEN 'There''ll be one green bottle hanging on the wall.'
            WHEN 2  THEN 'There''ll be two green bottles hanging on the wall.'
            WHEN 3  THEN 'There''ll be three green bottles hanging on the wall.'
            WHEN 4  THEN 'There''ll be four green bottles hanging on the wall.'
            WHEN 5  THEN 'There''ll be five green bottles hanging on the wall.'
            WHEN 6  THEN 'There''ll be six green bottles hanging on the wall.'
            WHEN 7  THEN 'There''ll be seven green bottles hanging on the wall.'
            WHEN 8  THEN 'There''ll be eight green bottles hanging on the wall.'
            WHEN 9  THEN 'There''ll be nine green bottles hanging on the wall.'
        END as lyrics
    
    FROM "bottle-song"
    
    UNION ALL
    
    -- Recursive case: subsequent verses
    SELECT 
        sv.id,
        sv.verse_number + 1,
        sv.current_bottles - 1,
        sv.lyrics || CHAR(10) || CHAR(10) ||
        CASE sv.current_bottles - 1
            WHEN 10 THEN 'Ten green bottles hanging on the wall,' || CHAR(10)
            WHEN 9  THEN 'Nine green bottles hanging on the wall,' || CHAR(10)
            WHEN 8  THEN 'Eight green bottles hanging on the wall,' || CHAR(10)
            WHEN 7  THEN 'Seven green bottles hanging on the wall,' || CHAR(10)
            WHEN 6  THEN 'Six green bottles hanging on the wall,' || CHAR(10)
            WHEN 5  THEN 'Five green bottles hanging on the wall,' || CHAR(10)
            WHEN 4  THEN 'Four green bottles hanging on the wall,' || CHAR(10)
            WHEN 3  THEN 'Three green bottles hanging on the wall,' || CHAR(10)
            WHEN 2  THEN 'Two green bottles hanging on the wall,' || CHAR(10)
            WHEN 1  THEN 'One green bottle hanging on the wall,' || CHAR(10)
            WHEN 0  THEN ''  -- No bottles left
        END
        ||
        CASE sv.current_bottles - 1
            WHEN 10 THEN 'Ten green bottles hanging on the wall,' || CHAR(10)
            WHEN 9  THEN 'Nine green bottles hanging on the wall,' || CHAR(10)
            WHEN 8  THEN 'Eight green bottles hanging on the wall,' || CHAR(10)
            WHEN 7  THEN 'Seven green bottles hanging on the wall,' || CHAR(10)
            WHEN 6  THEN 'Six green bottles hanging on the wall,' || CHAR(10)
            WHEN 5  THEN 'Five green bottles hanging on the wall,' || CHAR(10)
            WHEN 4  THEN 'Four green bottles hanging on the wall,' || CHAR(10)
            WHEN 3  THEN 'Three green bottles hanging on the wall,' || CHAR(10)
            WHEN 2  THEN 'Two green bottles hanging on the wall,' || CHAR(10)
            WHEN 1  THEN 'One green bottle hanging on the wall,' || CHAR(10)
            WHEN 0  THEN ''  -- No bottles left
        END
        ||
        CASE WHEN sv.current_bottles - 1 > 0 THEN 
            'And if one green bottle should accidentally fall,' || CHAR(10)
        ELSE '' END
        ||
        CASE sv.current_bottles - 2
            WHEN -1 THEN 'There''ll be no green bottles hanging on the wall.'
            WHEN 0  THEN 'There''ll be no green bottles hanging on the wall.'
            WHEN 1  THEN 'There''ll be one green bottle hanging on the wall.'
            WHEN 2  THEN 'There''ll be two green bottles hanging on the wall.'
            WHEN 3  THEN 'There''ll be three green bottles hanging on the wall.'
            WHEN 4  THEN 'There''ll be four green bottles hanging on the wall.'
            WHEN 5  THEN 'There''ll be five green bottles hanging on the wall.'
            WHEN 6  THEN 'There''ll be six green bottles hanging on the wall.'
            WHEN 7  THEN 'There''ll be seven green bottles hanging on the wall.'
            WHEN 8  THEN 'There''ll be eight green bottles hanging on the wall.'
            WHEN 9  THEN 'There''ll be nine green bottles hanging on the wall.'
            ELSE ''
        END
    
    FROM song_verses sv
    JOIN "bottle-song" bs ON sv.id = bs.rowid
    WHERE sv.verse_number < bs.take_down
    AND sv.current_bottles > 1
)

-- Update the table with the complete song
UPDATE "bottle-song"
SET result = (
    SELECT sv.lyrics 
    FROM song_verses sv 
    WHERE sv.id = "bottle-song".rowid
    ORDER BY sv.verse_number DESC 
    LIMIT 1
);