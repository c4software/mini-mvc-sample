-- Create logs table
CREATE TABLE logs (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    level TEXT NOT NULL CHECK(level IN ('DEBUG', 'INFO', 'WARN', 'ERROR', 'FATAL')),
    message TEXT NOT NULL,
    module TEXT,
    user_id INTEGER,
    ip_address TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample log records
INSERT INTO logs (level, message, module, user_id, ip_address) VALUES 
    ('INFO', 'User login successful', 'auth', 1, '192.168.1.100'),
    ('ERROR', 'Database connection failed', 'database', NULL, '192.168.1.101'),
    ('WARN', 'Invalid login attempt', 'auth', NULL, '192.168.1.102'),
    ('INFO', 'User created new account', 'user', 2, '192.168.1.103'),
    ('DEBUG', 'Cache cleared successfully', 'cache', 1, '192.168.1.100'),
    ('FATAL', 'System out of memory', 'system', NULL, '192.168.1.104'),
    ('INFO', 'Password reset requested', 'auth', 3, '192.168.1.105'),
    ('ERROR', 'File upload failed', 'upload', 2, '192.168.1.106');