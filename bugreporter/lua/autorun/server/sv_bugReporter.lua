util.AddNetworkString( "bug_report_value" )
require("tmysql4")

local DATABASE_HOST = "localhost"
local DATABASE_PORT = 3306
local DATABASE_NAME = "db_table"
local DATABASE_USERNAME = "user"
local DATABASE_PASSWORD = "pass"

local BugDB = tmysql.Connect(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME, DATABASE_PORTS)

local function GetSteamID(len, ply)
    local bug_report_value = net.ReadString()
    BugDB:Query( "INSERT INTO bug_report (BugReport, SteamID) VALUES ('" .. bug_report_value .. "','" .. ply:SteamID() .. "');")
    ply:PrintMessage(HUD_PRINTTALK , "Success!")
end

net.Receive("bug_report_value", GetSteamID)