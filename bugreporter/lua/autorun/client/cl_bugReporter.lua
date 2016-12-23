function BugReportDerma()
	local bugReporterDerma = vgui.Create("DFrame")
	bugReporterDerma:SetSize(500,110)
    bugReporterDerma:SetTitle("Suggestion/Bug Reporter")
    bugReporterDerma:Center()
   	bugReporterDerma:SetVisible(true)
    bugReporterDerma:SetDraggable(true)
    bugReporterDerma:ShowCloseButton(true)
    bugReporterDerma:SetBackgroundBlur(true)
    bugReporterDerma:MakePopup()

    local bugInput = vgui.Create("DTextEntry", bugReporterDerma)
    bugInput:SetPos( 5, 25 )
    bugInput:SetSize( 490, 50 )

    local SubmitButton = vgui.Create( "DButton", bugReporterDerma)
    SubmitButton:SetText( "Submit" )
    SubmitButton:SetTextColor( Color( 0, 0, 0 ) )
    SubmitButton:SetPos( 5, 80 )
    SubmitButton:SetSize( 240, 25 )
    SubmitButton.DoClick = function()
    	net.Start("bug_report_value")
		net.WriteString(bugInput:GetValue(self))
		net.SendToServer()
        bugReporterDerma:Close()
    end

    local CloseButton = vgui.Create( "DButton", bugReporterDerma)
    CloseButton:SetText( "Exit" )
    CloseButton:SetTextColor( Color( 0, 0, 0 ) )
    CloseButton:SetPos( 255, 80 )
    CloseButton:SetSize( 240, 25 )
    CloseButton.DoClick = function()
        bugReporterDerma:Close()
    end
end

concommand.Add("bug_reporter", BugReportDerma)