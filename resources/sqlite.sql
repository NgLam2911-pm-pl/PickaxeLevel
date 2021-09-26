-- #! sqlite
-- #{ pickaxelevel
-- #    { init
CREATE TABLE IF NOT EXISTS PickaxeLevel
(
    Player VARCHAR(40) NOT NULL,
    Level  INTEGER     NOT NULL DEFAULT 0,
    Exp    INTEGER     NOT NULL DEFAULT 0
);
-- #    }
-- #    { register
-- #        :player string
-- #        :level int
-- #        :exp int
INSERT OR
REPLACE
INTO PickaxeLevel (Player, Level, Exp)
VALUES (:player, :level, :exp);
-- #    }
-- #    { remove
-- #        :player string
DELETE
FROM PickaxeLevel
WHERE Player = :player;
-- #    }
-- #    { update
-- #        { level
-- #            :player string
-- #            :level int
UPDATE PickaxeLevel
SET Level = :level
WHERE Player = :player;
-- #        }
-- #        { exp
-- #            :player string
-- #            :exp int
UPDATE PickaxeLevel
SET Exp = :exp
WHERE Player = :player;
-- #        }
-- #    }
-- #    { select
-- #        { player
-- #            :player string
SELECT *
FROM PickaxeLevel
WHERE Player = :player;
-- #        }
-- #        { top
SELECT *
FROM PickaxeLevel
ORDER BY Level;
-- #        }
-- #    }