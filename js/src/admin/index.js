import app from 'flarum/app';
import TelegramSettingsModal from './components/TelegramSettingsModal';

app.initializers.add('ghostiq-flarumtelegram', () => {
    app.extensionSettings['ghostiq-flarumtelegram'] = () => app.modal.show(new TelegramSettingsModal());
});